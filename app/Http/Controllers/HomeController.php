<?php

namespace App\Http\Controllers;

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
        $sliders = Slider::select('*')->get();
        return view('welcome', compact('sliders'));
    }
}
