<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::select('*')->get();

        return view('admin.admin-slider', compact('sliders'));
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
        $slider = new Slider();
        $slider->fill($request->all());

        $img = $request->file('img');
        $file_route = $request->nombre.'_'.$img->getClientOriginalName();
        Storage::disk('img-slider')->put($file_route, file_get_contents($img->getRealPath()));

        $slider->img = $file_route;

        $slider->save();
        return redirect()->to(route('slider.index'));
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
        $slider = Slider::select('*')->where('id', $id)->first();
        return $slider;
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
        $slider = Slider::findOrFail($request->id);
        $file_route = $slider->img;
        if($request->img != null){

            $img = $request->file('img');
            $file_route = $request->nombre.'_'.$img->getClientOriginalName();
            Storage::disk('img-slider')->put($file_route, file_get_contents($img->getRealPath()));

        }
        $slider->fill($request->all());
        $slider->img = $file_route;

        $slider->save();
        return redirect()->to(route('slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::disk('img-slider')->delete($slider->img);
        $slider->delete();
        return redirect()->to(route('slider.index'));
    }
}
