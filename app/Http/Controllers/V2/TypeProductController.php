<?php

namespace App\Http\Controllers\V2;

use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class TypeProductController
 * @package App\Http\Controllers
 */
class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeProducts = TypeProduct::paginate();

        return view('type-product.index', compact('typeProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $typeProducts->perPage());
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSelects()
    {
        $typeProducts = TypeProduct::pluck('name as label', 'id as value');

        return response()->json($typeProducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeProduct = new TypeProduct();
        return view('type-product.create', compact('typeProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeProduct::$rules);

        $typeProduct = TypeProduct::create($request->all());

        return redirect()->back()
            ->with('success', 'Tipo de producto creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeProduct = TypeProduct::find($id);

        return view('type-product.show', compact('typeProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeProduct = TypeProduct::find($id);

        return view('type-product.edit', compact('typeProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeProduct $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeProduct $typeProduct)
    {
        request()->validate(TypeProduct::$rules);

        $typeProduct->update($request->all());

        return redirect()->route('type-products.index')
            ->with('success', 'TypeProduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeProduct = TypeProduct::find($id)->delete();

        return redirect()->route('type-products.index')
            ->with('success', 'TypeProduct deleted successfully');
    }
}
