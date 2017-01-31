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

        $categorias = $this->getCategorias($allCategories);

        $ofertas = Producto::where('oferta', '!=', '')->select('*')->get();

        $allProducts = [
            'sliders'    => $sliders,
            'productos'  => $productos,
            'categorias' => $categorias,
            'ofertas'    => $ofertas
        ];

        return view('welcome', compact('allProducts'));
    }

    public function getCategorias($allCategories)
    {
        $categorias = [];

        for($i = 0; $i <= count($allCategories)-1; $i++){
            array_push($categorias, $allCategories[$i]->categoria);
        }

        return array_unique($categorias);
    }
}
