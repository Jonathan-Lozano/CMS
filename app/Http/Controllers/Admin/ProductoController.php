<?php

namespace App\Http\Controllers\Admin;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(5);
        return view('admin.admin-productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->fill($request->all());

        $img = $request->file('img');
        $file_route = $request->nombre.'_'.$img->getClientOriginalName();
        Storage::disk('img-producto')->put($file_route, \File::get($img));

        $producto->img = $file_route;
        $producto->save();

        return redirect()->to(route('producto.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        $file_route = $producto->img;
        if($request->img != null){
            $img = $request->file('img');
            $file_route = $request->nombre.'_'.$img->getClientOriginalName();
            Storage::disk('img-producto')->delete($producto->img);
            Storage::disk('img-producto')->put($file_route, \File::get($img));
        }
        $producto->fill($request->all());
        $producto->img = $file_route;

        $producto->save();
        return redirect()->to(route('producto.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        Storage::disk('img-producto')->delete($producto->img);
        $producto->delete();
        return redirect()->to(route('producto.index'));
    }
}
