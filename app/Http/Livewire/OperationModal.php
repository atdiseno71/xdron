<?php

namespace App\Http\Livewire;

use App\Models\Operation;
use Livewire\Component;

class OperationModal extends Component
{

    protected $listeners = ["display-modal"=> "toggleModal", "close-modal"=> "hideModal"];

    public function toggleModal($id) {

        try {
            $operation = Operation::findOrFail($id);

            $this->dispatchBrowserEvent("show-modal", ["operation"=> $operation]);
        } catch (\Throwable $th) {
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
