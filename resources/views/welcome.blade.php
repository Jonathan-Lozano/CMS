@extends('layouts.master-page')
@include('layouts.style')
@section('content')
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            @if($sliders)
                <ol class="carousel-indicators">
                    @foreach($sliders as $slider)
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $isActive = ($loop->index == 0) ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
            @endif

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @if($sliders)
                    @foreach($sliders as $slider)
                        <div class="{{ $isActive = ($loop->iteration == 1) ? 'item active' : 'item' }}">
                            {{ Html::image('/media/img-slider/'.$slider->img, "Imagen no encontrada", ['title' => $slider->nombre]) }}
                            <div class="carousel-caption">
                                <h3>{{ $slider->nombre }}</h3>
                                <p>{{ $slider->descripcion }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="item">
                        {{ Html::image('media/img4.jpg', "No hay imagenes que mostrar", ['title' => 'No hay imagenes']) }}
                        <div class="carousel-caption">
                            <h3>No se han registrado sliders</h3>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection