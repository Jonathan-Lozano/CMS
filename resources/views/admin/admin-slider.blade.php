@extends('admin.layout.admin-mater-page')

@section('content')
    <div class="page-header">
        <h1>Administración de <small>Sliders</small></h1>
        <div class="right">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalNew">Nuevo slider</a>
        </div>
    </div>


    <div class="container">

        <div class="row">
            @forelse($sliders as $slider)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" style="border: 1px solid;">
                            {{ Html::image('/media/img-slider/'.$slider->img, "Imagen no encontrada", ['title' => $slider->nombre, 'style' => 'border: 1px solid;']) }}
                            <div class="caption" style="border: 1px solid;">
                                <h3>{{ $slider->nombre }}</h3>
                                <p>{{ $slider->descripcion }}</p>
                                <div class="btn-group">
                                    <a href="#" data-slider="{{ $slider->id }}" class="btn btn-info btn-editSlider" data-toggle="modal" data-target="#modalEdit">Editar</a>
                                    <a href="{{ route('slider.destroy', $slider->id) }}" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @empty
                <h1>No hay imagenes de muestra</h1>
            @endforelse
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
                        {{ Form::open(['route' => 'slider.update', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'updSlid']) }}
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

    {{ Form::open(['route' => ['slider.edit', 'ID'], 'method' => 'GET', 'id' => 'editSlid']) }}
    {{ Form::close() }}

@endsection
@section('extraScript')
<script type="text/javascript" src="{{ asset('js/admin-slider.js') }}"></script>
@show