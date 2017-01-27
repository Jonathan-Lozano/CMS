@extends('admin.layout.admin-mater-page')

@section('content')
    <div class="page-header">
        <h1>Administración de <small>Sliders</small></h1>
        <div class="right">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalNew">Nuevo slider</a>
        </div>
    </div>


    <div class="container">

        @if($sliders)
            <div class="row">
            @foreach($sliders as $slider)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" style="border: 1px solid;">
                        {{ Html::image('/media/img-slider/'.$slider->img, "Imagen no encontrada", ['title' => $slider->nombre, 'style' => 'border: 1px solid;']) }}
                        <div class="caption" style="border: 1px solid;">
                            <h3>{{ $slider->nombre }}</h3>
                            <p>{{ $slider->descripcion }}</p>
                            <div class="btn-group">
                                <a data-slider="{{ route('slider.edit', $slider->id) }}" class="btn btn-info btn-editSlider" data-toggle="modal" data-target="#modalEdit">Editar</a>
                                <a href="{{ route('slider.destroy', $slider->id) }}" class="btn btn-danger" role="button">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @else
            <div class="row">
                <h1>No hay imagenes de muestra</h1>
            </div>
        @endif


        <div class="panel panel-default">
            <div class="panel-body row">

                <div class="panel panel-primary col-md-4">
                    <div class="panel-heading">
                        <h3 class="panel-title">Panel title</h3>
                    </div>
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left"> <a href="#">
                                    <img alt="64x64" class="media-object" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTlkZDI2MDQyMiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1OWRkMjYwNDIyIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxNCIgeT0iMzYuNSI+NjR4NjQ8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true"> </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Media heading</h4>
                                Loresdasd
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- Modals nuevo, editar, eliminar -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalNew">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nuevo slider</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route' => 'slider.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre') }}
                            {{ Form::text('nombre', null,['id' => 'nombre', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('descripcion', 'Descripción') }}
                            {{ Form::textArea('descripcion', null, ['id' => 'descripcion', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('img', 'Imagen') }}
                            {{ Form::file('img', ['id' => 'img', 'class' => 'form-control']) }}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar slider</h4>
                    </div>
                    <div class="modal-body">
                        {{ Form::model($slider, ['route' => ['slider.update', $slider], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        {{ Form::hidden('id', null, ['id' => 'idUp']) }}
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre') }}
                            {{ Form::text('nombre', null,['id' => 'nombreSU', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('descripcion', 'Descripción') }}
                            {{ Form::textArea('descripcion', null, ['id' => 'descripcionSU', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('img', 'Imagen') }}
                            {{ Form::file('img', ['id' => 'imgSU', 'class' => 'form-control']) }}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('extraScript')
<script type="text/javascript" src="{{ asset('js/admin-slider.js') }}"></script>
@show