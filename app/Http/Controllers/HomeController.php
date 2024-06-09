<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Operation;
use Exception;
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

        try {
            // Capturamos el usuario logeado
            $user_log = User::with('roles')->find(Auth::id());
            // Validamos que si o si tenga rol
            if (count($user_log->roles) == 0) {
                throw new Exception("No tiene un rol asignado");
            }
            // Capturamos el rol
            $rol = $user_log->roles[0]?->id;

            // Si es piloto o cliente
            if (in_array($rol, [config('roles.cliente'), config('roles.piloto')])) {
                return redirect()->route('operations.index');
            } else {
                return redirect()->route('operations.index');
                // return view('home');
            }
        } catch (Exception $ex) {
            if ($ex->getMessage() == "No tiene un rol asignado") {
                auth()->logout(); // Cerrar sesión
                return redirect()->back()->with('error', 'Tu cuenta no tiene un rol asignado.');
            }
        }
    }
}
