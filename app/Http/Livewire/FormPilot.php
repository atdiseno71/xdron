<?php

namespace App\Http\Livewire;

use App\Models\DetailOperation;
use App\Models\FilesOperation;
use App\Models\TypeProduct;
use App\Models\Assistant;
use App\Models\Operation;
use Livewire\Component;
use App\Models\Client;
use App\Models\Estate;
use App\Models\Dron;
use App\Models\Luck;
use App\Models\User;
use App\Models\Zone;

class FormPilot extends Component
{
    public $id_operation;

    public function render()
    {

        try {

            $clients = Client::pluck('social_reason as label', 'id as value');

            $detail_operation = new DetailOperation();

            $files_operation = new FilesOperation();

            $type_products = TypeProduct::pluck('name as label', 'id as value');

            $assistents = Assistant::pluck('name as label', 'id as value');

            $pilots = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

            $estates = Estate::pluck('name as label', 'id as value');

            $lucks = Luck::pluck('name as label', 'id as value');

            $zones = Zone::pluck('name as label', 'id as value');

            $drones = Dron::pluck('enrollment as label', 'id as value');

            $operation = new Operation();

            if ($this->id_operation != null) {
                $operation = Operation::findOrFail($this->id_operation);
            }

            return view('livewire.form-pilot', compact(
                'operation',
                'detail_operation',
                'type_products',
                'assistents',
                'pilots',
                'clients',
                'estates',
                'drones',
                'lucks',
                'zones',
                'files_operation',
            ));

        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

}
