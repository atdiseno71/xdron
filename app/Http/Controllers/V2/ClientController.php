<?php

namespace App\Http\Controllers\V2;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{

    function __construct()
    {
        $this->middleware('can:clients.index')->only('index', 'getSelects');
        $this->middleware('can:clients.create')->only('create', 'store', 'storeFromUser');
        $this->middleware('can:clients.show')->only('show');
        $this->middleware('can:clients.edit')->only('edit', 'update');
        $this->middleware('can:clients.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate();

        return view('client.index', compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * $clients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        return view('client.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Client::$rules);

        $request['created_by'] = Auth::id();

        $client = Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Cliente creado con exito.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromUser(Request $request)
    {
        request()->validate(Client::$rules);

        $request['created_by'] = Auth::id();

        $client = Client::create($request->all());

        return redirect()->back()
            ->with('success', 'Cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSelects()
    {
        $clients = Client::pluck('social_reason as label', 'id as value');

        return response()->json($clients);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);

        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        request()->validate(Client::$rules);

        $request['created_by'] = Auth::id();

        $client->update($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Cliente actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $client = Client::find($id)->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Cliente eliminado con exito.');
    }
}
