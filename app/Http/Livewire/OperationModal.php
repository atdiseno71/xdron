<?php

namespace App\Http\Livewire;

use App\Models\Operation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class OperationModal extends Component
{

    protected $listeners = ["display-modal"=> "toggleModal", "close-modal"=> "hideModal"];

    public function toggleModal($id) {

        try {

            $admin_user = Auth::id();

            $operation = Operation::with('drone', 'zone', 'observation', 'user_pilot', 
                'userAdmin', 'product', 'client', 'assistant_two', 'assistant_one', 'details', 'details.estate')
                                    ->findOrFail($id);

            /************************************************
             *              Calcular totales
             ************************************************/
            // hectáreas, baterías, horas de vuelo
            $hectares = 0;
            // Valores por vuelo
            foreach ($operation->details as $detail) {
                $hectares += $detail->acres;
            }

            $this->dispatchBrowserEvent("show-modal", ["operation"=> $operation, 'hectares' => $hectares, 'id_auth' => $admin_user]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('operations.index')
                ->with('error', 'No existe la operación que intenta buscar.');
        }
    }

    public function hideModal() {
        $this->dispatchBrowserEvent("hide-modal");
    }

    public function render()
    {
        return view('livewire.operation-modal');
    }
}
