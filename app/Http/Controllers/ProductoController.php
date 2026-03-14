<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::paginate(10);
        return view('index', compact('productos'));
    }

    public function store(Request $request)
    {
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria
        ]);

        return redirect()->route('productos.index')->with('success','Producto creado correctamente');

    }


    public function edit($id){

        $producto = Producto::findOrFail($id);

        return view('edit', compact('producto'));

    }

    public function update($id, Request $request){

        $producto = Producto::findOrFail($id);

        $producto->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria
        ]);

        return redirect()->route('productos.index')->with('info','Producto actualizado correctamente');

    }




    public function destroy($id)
    {
        Producto::findOrFail($id)->delete();

        return redirect()->route('productos.index')->with('error','Producto eliminado correctamente');

    }
}
