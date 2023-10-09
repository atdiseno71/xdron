<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\Operation;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Log;

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

    public function updateSearch()
    {
        $this->emit('updateSearch', $this->type);
    }

    public function mount()
    {
        $this->type = '1';
    }

    public function render()
    {

        // Capturamos el usuario logeado
        $user_log = User::with('roles')->find(Auth::id());
        // Capturamos el rol
        $rol = $user_log->roles[0]?->id;

        Log::info($this->type);

        // Tipos de busqueda
        $types = [
            '1' => 'tipo 1',
            '2' => 'tipo 2'
        ];

        $type_option = $this->type;

        switch ($rol) {
            case config('roles.piloto'):
                $operations = Operation::where('pilot_id', $user_log->id)->paginate();
                break;
            case config('roles.cliente'):
                $operations = Operation::where('id_cliente', $user_log->id)->paginate();
                break;
            default:
                $operations = Operation::paginate();
                break;
        }

        return view('livewire.index-operation', compact('operations', 'types', 'type_option'));
    }

}
