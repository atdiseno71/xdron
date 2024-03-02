<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\TypeProduct;
use App\Models\Operation;
use Livewire\Component;
use App\Models\Client;
use App\Models\Dron;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class IndexOperation extends Component
{

    use WithPagination;

    public $typeProduct;
    public $enrollment;
    public $dateStart;
    public $dateEnd;
    public $client;
    public $user;

    protected $paginationTheme = 'bootstrap';

    /* public function updatingPage()
    {
        $this->resetPage();
    }

    protected $listeners = ['updatePage' => 'updatingPage']; */

    public function render()
    {
        // Capturamos el usuario logeado
        $user_log = User::with('roles')->find(Auth::id());
        // Capturamos el rol
        $rol = $user_log->roles[0]?->id;

        $type_product = $this->typeProduct;
        $enrollment = $this->enrollment;
        $date_start = $this->dateStart;
        $date_end = $this->dateEnd;
        $client = $this->client;
        $user = $this->user;

        $operations = Operation::where(function ($query) use ($rol, $user_log, $type_product, $enrollment, $date_start, $date_end, $client, $user) {

            if ($rol === config('roles.piloto')) {
                $query->where('pilot_id', $user_log->id);
            } elseif ($rol === config('roles.cliente')) {
                $query->whereHas('client.users', function ($query) use ($user_log) {
                    $query->where('user_id', $user_log->id);
                });
            }

            $useFilters = [
                'type_product' => null,
                'enrollment' => null,
                'date_start' => null,
                'date_end' => null,
                'client' => null,
                'user' => null,
            ];

            // Agregamos a useFilters lo que esta usando el cliente actualmente
            if ($type_product) {
                $useFilters['type_product'] = $type_product;
            }

            if ($enrollment) {
                $useFilters['enrollment'] = $enrollment;
            }

            if ($date_start) {
                $useFilters['date_start'] = $date_start;
            }

            if ($date_end) {
                $useFilters['date_end'] = $date_end;
            }

            if ($client) {
                $useFilters['client'] = $client;
            }

            if ($user) {
                $useFilters['user'] = $user;
            }

            // Filtrar
            $this->applyFilter($query, $useFilters);
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

        // Relaciones para los filtros
        $clients = Client::pluck('social_reason as label', 'id as value');
        $type_products = TypeProduct::pluck('name as label', 'id as value');
        $users = User::pluck('name as label', 'id as value');
        $enrollments = $drones = Dron::pluck('enrollment as label', 'id as value');

        return view('livewire.index-operation', compact('operations', 'hectares', 'batteries', 'flight_hours', 'clients', 'type_products', 'users', 'enrollments'));
    }

    private function applyFilter($query, $filters)
    {

        // Lista de filtros
        $list = [
            'type_product_id',
            'dron_id',
            'date_operation',
            'date_operation',
            'id_cliente',
            'pilot_id',
        ];

        $sql = "";
        $cont = 0;

        foreach ($filters as $key => $value) {
            if ($value) {
                if ($key == 'date_start') {
                    $query->where($list[$cont], '>=', $value);
                } else if ($key == 'date_end') {
                    $query->where($list[$cont], '<=', $value);
                } else if ($key == 'user') {
                    $query->orWhere('pilot_id', $value)->orWhere('admin_by', $value);
                } else {
                    $query->where($list[$cont], $value);
                }
            }
            $cont++;
        }
    }

    // BEGIN:FILTER DATES

    private function applyDatesFilter($query)
    {
        $query->where('date_operation', '>=', $this->dateStart)
            ->where('date_operation', '<=', $this->dateEnd);
    }

    private function applyDateStartFilter($query)
    {
        $query->where('date_operation', $this->dateStart);
    }

    private function applyDateEndFilter($query)
    {
        $query->where('date_operation', '<=', $this->dateEnd);
    }
    // END:FILTER DATES

    // BEGIN:FILTER CLIENT
    private function applyClientFilter($query)
    {
        $query->orWhereHas('client', function ($query) {
            $query->orWhereIn('clients.id', [$this->client]);
        });
    }
    // END:FILTER CLIENT

    // BEGIN:FILTER TYPE-PRODUCT
    private function applyTypeProductFilter($query)
    {
        $query->whereHas('product', function ($query_type) {
            $query_type->orWhere('type_products.id', $this->typeProduct);
        });
    }
    // END:FILTER TYPE-PRODUCT

    // BEGIN:FILTER USER
    private function applyUserFilter($query)
    {
        $query->orWhereHas('userAdmin', function ($query_type) {
            $query_type->orWhere('users.id', $this->user);
        })->orWhereHas('user_pilot', function ($query_type) {
            $query_type->orWhere('users.id', $this->user);
        });
    }
    // END:FILTER USER

    // BEGIN:FILTER DRONE
    private function applyDroneFilter($query)
    {
        $query->orWhereHas('drone', function ($query_type) {
            $query_type->orWhere('enrollment.id', $this->typeProduct);
        });
    }
    // END:FILTER DRONE

}
