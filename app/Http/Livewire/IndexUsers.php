<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class IndexUsers extends Component
{

    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->OrWhere('lastname', 'LIKE', '%' . $this->search . '%')
            ->OrWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.index-users', compact('users'));
    }
}
