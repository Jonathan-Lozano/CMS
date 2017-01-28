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


        <div class="row" style="margin-top: 15px;">

            <div class="col-md-8">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row" style="padding: 10px;">

                            @for($i = 0; $i <= 8; $i++)
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail" style="border: 1px solid;">
                                        {{ Html::image('/media/img4.jpg', "Imagen no encontrada", ['title' => 'Imagen', 'style' => 'border: 1px solid;']) }}
                                        <div class="caption" style="border: 1px solid;">
                                            <h3>Titulo</h3>
                                            <p>Descripcion</p>
                                            <div class="btn-group">
                                                <a class="btn btn-info btn-editSlider" data-toggle="modal" data-target="#modalEdit">Editar</a>
                                                <a class="btn btn-danger" role="button">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row" style="padding: 10px;">

                            <p>Panel izquierdo donde se mostraran las categorias, ofertas, etc</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection