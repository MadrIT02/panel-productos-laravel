<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $productos = Producto::when($request->buscar, function ($query) use ($request) {
        $query->where('nombre', 'like', '%' . $request->buscar . '%');})->paginate(10);

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }


    public function store(ProductoRequest $request)
    {
        Producto::create($request->validated());

        return redirect()
            ->route('productos.index')
            ->with('success','Producto creado correctamente');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validated());

        return redirect()
            ->route('productos.index')
            ->with('info','Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('error','Producto eliminado correctamente');
    }
}
