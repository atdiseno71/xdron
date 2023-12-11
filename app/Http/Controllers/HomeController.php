<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Capturamos el usuario logeado
        $user_log = User::with('roles')->find(Auth::id());
        // Capturamos el rol
        $rol = $user_log->roles[0]?->id;

        // Si es piloto o cliente
        if (in_array($rol, [config('roles.cliente'), config('roles.piloto')])) {
            $operations = Operation::where('pilot_id', $user_log->id)->paginate();
            return view('operation.index', compact('operations'))
                    ->with('i', (request()->input('page', 1) - 1) * $operations->perPage());
        } else {
            return view('home');
        }

    }
}
