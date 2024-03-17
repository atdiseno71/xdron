<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\TypeProduct;
use App\Models\Operation;
use App\Models\Assistant;
use Livewire\Component;
use App\Models\Client;
use App\Models\Estate;
use App\Models\Dron;
use App\Models\User;

class IndexOperation extends Component
{

    use WithPagination;

    public $assistent_one;
    public $assistent_two;
    public $typeProduct;
    public $enrollment;
    public $dateStart;
    public $estate;
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

        $assistent_one = $this->assistent_one;
        $assistent_two = $this->assistent_two;
        $type_product = $this->typeProduct;
        $enrollment = $this->enrollment;
        $date_start = $this->dateStart;
        $date_end = $this->dateEnd;
        $estate = $this->estate;
        $client = $this->client;
        $user = $this->user;

        $operations = Operation::where(function ($query) use ($rol, $user_log, $type_product, $enrollment, $date_start, $date_end, $client, $user, $assistent_one, $assistent_two, $estate) {

            if ($rol === config('roles.piloto')) {
                $query->where('pilot_id', $user_log->id);
            } elseif ($rol === config('roles.cliente')) {
                $query->whereHas('client.users', function ($query) use ($user_log) {
                    $query->where('user_id', $user_log->id);
                });
            }

            $useFilters = [
                'assistent_one' => null,
                'assistent_two' => null,
                'type_product' => null,
                'enrollment' => null,
                'date_start' => null,
                'date_end' => null,
                'estates' => null,
                'client' => null,
                'user' => null,
            ];

            // Agregamos a useFilters lo que esta usando el cliente actualmente
            if ($assistent_one) {
                $useFilters['assistent_one'] = $assistent_one;
            }

            if ($assistent_two) {
                $useFilters['assistent_two'] = $assistent_two;
            }

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

            if ($estate) {
                $useFilters['estate'] = $estate;
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
            // Valores por operacion
            $batteries += $operation->number_flights;
            $flight_hours += $operation->hour_flights;
            // Valores por vuelo
            foreach ($operation->details as $detail) {
                $hectares += $detail->acres;
            }
        }

        // Damos formato de dos decimales a todo
        $hectares_hours = number_format($flight_hours != 0 ?($hectares / $flight_hours) : 0, 2, ',', ' ');
        $hectares_batteries = number_format($batteries != 0 ?($hectares / $batteries) : 0, 2, ',', ' ');
        $hectares = number_format($hectares, 2, ',', ' ');
        $batteries = number_format($batteries, 2, ',', ' ');
        $flight_hours = number_format($flight_hours, 2, ',', ' ');

        // Relaciones para los filtros
        $assistents = Assistant::pluck('name as label', 'id as value');
        $clients = Client::pluck('social_reason as label', 'id as value');
        $type_products = TypeProduct::pluck('name as label', 'id as value');
        $enrollments = $drones = Dron::pluck('enrollment as label', 'id as value');
        $pilots = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');
        $estates = Estate::pluck('name as label', 'id as value');

        return view('livewire.index-operation', compact(
            'operations',
            'hectares',
            'batteries',
            'flight_hours',
            'estates',
            'clients',
            'type_products',
            'pilots',
            'enrollments',
            'assistents',
            'hectares_hours',
            'hectares_batteries'
        ));
    }

    private function applyFilter($query, $filters)
    {

        // Lista de filtros
        $list = [
            'assistant_id_one',
            'assistant_id_two',
            'type_product_id',
            'dron_id',
            'date_operation',
            'date_operation',
            'id_cliente',
            'pilot_id',
            'estate',
        ];

        $sql = "";
        $cont = 0;

        foreach ($filters as $key => $value) {
            if ($value) {

                switch ($key) {
                    case 'estate':
                        $query->whereHas('details.estate', function ($subquery) use ($list, $cont, $value) {
                            $subquery->where('estate.id', $value);
                        });                        
                        break;
                    case 'date_start':
                        $query->where($list[$cont], '>=', $value);
                        break;
                    case 'date_end':
                        $query->where($list[$cont], '<=', $value);
                        break;
                    default:
                        $query->where($list[$cont], $value);
                        break;
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
