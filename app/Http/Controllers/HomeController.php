<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Slider;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $productos = Producto::paginate(9);
        $allCategories = Producto::select('categoria')
            ->orderBy('categoria')->get();

        $categorias = [];

        foreach($allCategories as $cat){
            array_push($categorias, $cat);
        }
        dd($categorias);
        return view('welcome', compact('sliders'), compact('productos'));
    }
}
