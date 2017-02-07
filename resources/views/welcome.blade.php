@extends('layouts.master-page')

@section('content')
    <div class="container">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @forelse($allProducts['sliders'] as $slider)
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $isActive = ($loop->index == 0) ? 'active' : '' }}"></li>
                @empty
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                @endforelse
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @forelse($allProducts['sliders'] as $slider)
                    <div class="{{ $isActive = ($loop->iteration == 1) ? 'item active' : 'item' }}">
                        {{ Html::image('/media/img-slider/'.$slider->img, "Imagen no encontrada", ['title' => $slider->nombre]) }}
                        <div class="carousel-caption">
                            <h3>{{ $slider->nombre }}</h3>
                            <p>{{ $slider->descripcion }}</p>
                        </div>
                    </div>
                @empty
                    <div class="item active">
                        {{ Html::image('media/img-slider/slider-default.png', "No hay imagenes que mostrar", ['title' => 'No hay imagenes']) }}
                        <div class="carousel-caption">
                            <h3>No se han registrado sliders</h3>
                        </div>
                    </div>
                @endforelse
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

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row" style="padding: 10px;">


                            <div class="page-header">
                                <h2>Categorias</h2>
                            </div>
                            <div class="categorias">

                                @foreach($allProducts['categorias'] as $categoria)
                                    <span class="label label-default">{{ $categoria }}</span>
                                @endforeach
                            </div>

                            <div class="page-header">
                                <h2>Ofertas</h2>
                            </div>
                            <div class="one-time ofertas row">
                                    @forelse($allProducts['ofertas'] as $producto)
                                        <div class="col-md-12">
                                            <div class="thumbnail" style="border: 1px solid;">
                                                {{ Html::image('/media/img-producto/' .$producto->img, "Imagen no encontrada", ['title' => $producto->nombre, 'style' => 'border: 1px solid; height: 150px; width: 50px;']) }}
                                                <div class="caption" style="border: 1px solid;">
                                                    <h4>{{ $producto->nombre }}</h4>
                                                    <p>
                                                    <ul>
                                                        <li>Precio: ${{ $producto->precio }}</li>
                                                        <li>Categoria: {{ $producto->categoria }}</li>
                                                        <li>Cantidad: {{ $producto->cantidad }}</li>
                                                    </ul>
                                                    </p>
                                                    <hr/>
                                                    <div class="btn-group">
                                                        <a class="btn btn-default btn-editSlider" data-toggle="modal" data-target="#modalEdit">Ver</a>
                                                        <a class="btn btn-info" role="button">Favoritos</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h2>Aun no hay productos</h2>
                                        </div>
                                    @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">

                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="page-header">
                            <h2>Productos</h2>
                        </div>

                        <div class="row" style="padding: 10px;">

                            @forelse($allProducts['productos'] as $producto)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail" style="border: 1px solid;">
                                    {{ Html::image('/media/img-producto/' .$producto->img, "Imagen no encontrada", ['title' => $producto->nombre, 'style' => 'border: 1px solid; height: 210px; width: 100%;']) }}
                                    <div class="caption" style="border: 1px solid;">
                                        <h4>{{ $producto->nombre }}</h4>
                                        <p>
                                            <ul>
                                                <li>Precio: ${{ $producto->precio }}</li>
                                                <li>Categoria: {{ $producto->categoria }}</li>
                                                <li>Cantidad: {{ $producto->cantidad }}</li>
                                            </ul>
                                        </p>
                                        <hr/>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-editSlider" data-toggle="modal" data-target="#modalEdit">Ver</a>
                                            <a class="btn btn-info" role="button">Favoritos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-md-12">
                                    <h2>Aun no hay productos</h2>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('extraScript')

    <script type="text/javascript">

        $('.one-time').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });

    </script>
@show