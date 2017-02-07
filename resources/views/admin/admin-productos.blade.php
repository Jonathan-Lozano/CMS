@extends('admin.layout.admin-mater-page')
@section('content')
    <div class="page-header">
        <h1>Administración de <small>Productos</small></h1>
        <div class="right">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalNew">Nuevo producto</a>
        </div>
    </div>


    <div class="container">

        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Especificaciones</th>
                    <th>Opciones</th>
                </tr>
                    @forelse($productos as $producto)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Html::image('/media/img-producto/'.$producto->img, "Imagen no encontrada", ['title' => $producto->nombre, 'class' => 'img-rounded img-responsive', 'style' => 'height: 85px; width: 64px;']) }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>
                                <p>Cantidad: <span>{{ $producto->cantidad }}</span></p>
                                <p>Precio: $<span>{{ $producto->precio }}</span></p>
                                <p>Disponible: <span>{{ $producto->disponible }}</span></p>
                                <p>Oferta: <span>{{ $oferta = $producto->oferta != null ? $producto->oferta : 'No hay ofertas.' }}</span></p>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" data-producto="{{ route('producto.edit', $producto->id) }}" class="btn btn-info btn-editProducto" role="button" data-toggle="modal" data-target="#modalEdit">Editar</a>
                                    <a href="{{ route('producto.delete', $producto->id) }}" class="btn btn-danger" role="button">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay productos</td>
                        </tr>
                    @endforelse
            </table>
            {{ $productos->links() }}
        </div>
    </div>


    <!-- Modals nuevo, editar, eliminar -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalNew">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nuevo Producto</h4>
                </div>
                <div class="modal-body">

                    {{ Form::open(['route' => 'producto.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre') }}
                        {{ Form::text('nombre', null,['id' => 'nombre', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('descripcion', 'Descripcion') }}
                        {{ Form::textArea('descripcion', null,['id' => 'descripcion', 'class' => 'form-control', 'rows' => '2']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('categoria', 'Categoría') }}
                        {{ Form::text('categoria', null,['id' => 'categoria', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('precio', 'Precio') }}
                        {{ Form::number('precio', null,['id' => 'precio', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('cantidad', 'Cantidad') }}
                        {{ Form::number('cantidad', null,['id' => 'cantidad', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('img', 'Imagen') }}
                        {{ Form::file('img', ['id' => 'img', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('disponible', 'Disponible') }}
                        {{ Form::select('disponible', ['SI' => 'Si', 'NO' => 'No'], 'Si', ['id' => 'cantidad', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('oferta', 'Oferta') }}
                        {{ Form::text('oferta', null,['id' => 'oferta', 'class' => 'form-control']) }}
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
                    <h4 class="modal-title">Editar Proveedor</h4>
                </div>
                <div class="modal-body">

                    {{ Form::open(['route' => 'producto.update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    {{ Form::hidden('id', null, ['id' => 'idUp']) }}
                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre') }}
                        {{ Form::text('nombre', null,['id' => 'nombreUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('descripcion', 'Descripcion') }}
                        {{ Form::textArea('descripcion', null,['id' => 'descripcionUp', 'class' => 'form-control', 'rows' => '2']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('categoria', 'Categoría') }}
                        {{ Form::text('categoria', null,['id' => 'categoriaUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('precio', 'Precio') }}
                        {{ Form::number('precio', null,['id' => 'precioUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('cantidad', 'Cantidad') }}
                        {{ Form::number('cantidad', null,['id' => 'cantidadUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('img', 'Imagen') }}
                        {{ Form::file('img', ['id' => 'imgUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('disponible', 'Disponible') }}
                        {{ Form::select('disponible', ['SI' => 'Si', 'NO' => 'No'], 'Si', ['id' => 'disponibleUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('oferta', 'Oferta') }}
                        {{ Form::text('oferta', null,['id' => 'ofertaUp', 'class' => 'form-control']) }}
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
    <script type="text/javascript" src="{{ asset('js/admin-producto.js') }}"></script>
@show