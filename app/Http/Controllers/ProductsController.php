<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showForm(){

        return view('products.form');
    }

    public function create(Request $request){
        $validate = $this->validate($request,[
            "name"        => "required|string|max:70",
            "pricing"     => "required|numeric",
            "description" => "required|string"
        ]);

        $nombre      = $request->input('name');
        $precio      = $request->input('pricing');
        $descripcion = $request->input('description');
        $usuario     = auth()->id();

        $producto = new Product();

        $producto->name = $nombre;
        $producto->pricing = $precio;
        $producto->description = $descripcion;
        $producto->user_id = $usuario;

        $producto->save();
        return redirect()->route('altasform')
            ->with(['message'=>'Ha dado de alta correctamente el producto']);

    }

    public function destroy($id){
        $producto = Product::find($id);

        $producto->delete();
        return redirect()->route('home')
        ->with(['message'=>'Se ha eliminado el producto con exito']);
    }

    public function edit($id){
        $producto = Product::find($id);

        return view('products.edit',compact('producto'));
    }

    public function update(Request $request, $id){
        $producto = Product::find($id);

        $validate = $this->validate($request,[
            "name"        => "required|string|max:70",
            "pricing"     => "required|numeric",
            "description" => "required|string"
        ]);

        $nombre      = $request->input('name');
        $precio      = $request->input('pricing');
        $descripcion = $request->input('description');

        $producto->name = $nombre;
        $producto->pricing = $precio;
        $producto->description = $descripcion;

        $producto->update();
        return redirect()->route('home')
                ->with(['message'=>'actualizado']);

    }

}
