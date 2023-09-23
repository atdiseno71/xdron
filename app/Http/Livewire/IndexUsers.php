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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::whereNotIn('id_role', [config('roles.super_root')])
            ->where(function ($query) {
                $query->orWhere('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%');
            })->with('roles')->paginate();

        return view('livewire.index-users', compact('users'));
    }
}
