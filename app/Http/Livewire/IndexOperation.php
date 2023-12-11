<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\Operation;
use Livewire\Component;
use App\Models\User;

class IndexOperation extends Component
{

    use WithPagination;

    public $search;
    public $type;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /* public function updateSearch()
    {
        $this->emit('updateSearch', $this->type);
    } */

    public function mount()
    {
        $this->type = '0';
    }

    public function render()
    {
        // Capturamos el usuario logeado
        $user_log = User::with('roles')->find(Auth::id());
        // Capturamos el rol
        $rol = $user_log->roles[0]?->id;

        $type_option = $this->type;

        $operations = Operation::where(function ($query) use ($rol, $user_log, $type_option) {

            if ($rol === config('roles.piloto')) {
                $query->where('pilot_id', $user_log->id);
            } elseif ($rol === config('roles.cliente')) {
                $query->whereHas('client.users', function ($query) use ($user_log) {
                    $query->where('user_id', $user_log->id);
                });
            }

            switch ($type_option) {
                case 1:
                    $this->applyEstateNameFilter($query);
                    break;
                case 2:
                    $this->applyLuckFilter($query);
                    break;
                case 3:
                    $this->applyTypeProductFilter($query);
                    break;
                case 4:
                    $this->applyDronFilter($query);
                    break;
                case 5:
                    $this->applyAsistentsFilter($query);
                    break;
                case 6:
                    $this->applyPilotFilter($query);
                    break;
                case 7:
                    $this->applyClientFilter($query);
                    break;
                case 8:
                    $this->applyAdminFilter($query);
                    break;
                case 9:
                    $this->applyEstateNameFilter($query);
                    break;
            }

        })->paginate();

        /************************************************
         *              Calcular totales
        ************************************************/
        // hectáreas, baterías, horas de vuelo
        $hectares = $batteries = $flight_hours = 0;

        foreach ($operations as $operation) {
            foreach ($operation->details as $detail) {
                $hectares += $detail->acres;
                $batteries += $detail->number_flights;
                $flight_hours += $detail->hour_flights;
            }
        }

        return view('livewire.index-operation', compact('operations','hectares','batteries','flight_hours'));
    }

    private function applyEstateNameFilter($query)
    {
        $query->whereHas('details', function ($query_type) {
            $query_type->whereHas('estate', function ($sub_query) {
                $sub_query->where('estate.name', 'LIKE', '%' . $this->search . '%');
            });
        });
    }

    private function applyLuckFilter($query)
    {
        $query->whereHas('details', function ($query) {
            $query->where('detail_operation.luck', 'LIKE', '%' . $this->search . '%');
        });
    }

    private function applyTypeProductFilter($query)
    {
        $query->whereHas('details', function ($query_type) {
            $query_type->whereHas('typeProduct', function ($sub_query) {
                $sub_query->where('type_products.name', 'LIKE', '%' . $this->search . '%');
            });
        });
    }

    private function applyDronFilter($query)
    {
        $query->whereHas('assistant_one', function ($query_type) {
            $query_type->whereHas('drone', function ($sub_query) {
                $sub_query->where('dron.enrollment', 'LIKE', '%' . $this->search . '%');
            });
        });
    }

    private function applyAsistentsFilter($query)
    {
        $query->orWhereHas('assistant_one', function ($query_type) {
            $query_type->orWhere('assistants.name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('assistants.lastname', 'LIKE', '%' . $this->search . '%');
        })->orWhereHas('assistant_two', function ($query_type) {
            $query_type->orWhere('assistants.name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('assistants.lastname', 'LIKE', '%' . $this->search . '%');
        });
    }

    private function applyPilotFilter($query)
    {
        $query->orWhereHas('userPilot', function ($query_type) {
            $query_type->where('users.name', 'LIKE', '%' . $this->search . '%')
                ->where('users.id_role', config('roles.piloto'));
        });
    }

    private function applyClientFilter($query)
    {
        $query->orWhereHas('client', function ($query_type) {
            $query_type->where('clients.social_reason', 'LIKE', '%' . $this->search . '%');
        });
    }

    private function applyAdminFilter($query)
    {
        $query->orWhereHas('userAdmin', function ($query_type) {
            $query_type->where('users.name', 'LIKE', '%' . $this->search . '%')
                ->whereIn('users.id_role', [config('roles.super_root'), config('roles.root')]);
        });
    }

    private function applyStatusFilter($query)
    {
        $query->orWhereHas('status', function ($query_type) {
            $query_type->where('statuses.name', 'LIKE', '%' . $this->search . '%');
        });
    }

}
