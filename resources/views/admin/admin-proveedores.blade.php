@extends('admin.layout.admin-mater-page')

@section('content')
    <div class="page-header">
        <h1>Administración de <small>Proveedores</small></h1>
        <div class="right">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalNew">Nuevo proveedor</a>
        </div>
    </div>


    <div class="container">

        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Contacto</th>
                    <th>Opciones</th>
                </tr>
                @forelse($proveedores as $proveedor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->empresa }}</td>
                        <td>
                            <p>{{ $proveedor->email_contact }}</p>
                            <p>{{ $proveedor->tel_contact }}</p>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-proveedor="{{ route('proveedor.edit', $proveedor->id) }}" class="btn btn-info btn-edit" data-toggle="modal" data-target="#modalEdit">Editar</a>
                                <a href="{{ route('proveedor.delete', $proveedor) }}" class="btn btn-danger" role="button">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay proveedores</td>
                    </tr>
                @endforelse
            </table>

            {{ $proveedores->links() }}
        </div>
    </div>


    <!-- Modals nuevo, editar, eliminar -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalNew">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nuevo Proveedor</h4>
                </div>
                <div class="modal-body">

                    {{ Form::open(['route' => 'proveedor.store', 'method' => 'POST']) }}
                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre') }}
                        {{ Form::text('nombre', null,['id' => 'nombre', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('empresa', 'Epresa') }}
                        {{ Form::text('empresa', null,['id' => 'empresa', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email_contact', 'Email contacto') }}
                        {{ Form::text('email_contact', null,['id' => 'email_contact', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('tel_contact', 'Telefono contact') }}
                        {{ Form::text('tel_contact', null,['id' => 'tel_contact', 'class' => 'form-control']) }}
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

                    {{ Form::open(['route' => 'proveedor.update', 'method' => 'POST']) }}
                    {{ Form::hidden('id', null, ['id' => 'idUp']) }}
                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre') }}
                        {{ Form::text('nombre', null,['id' => 'nombreUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('empresa', 'Epresa') }}
                        {{ Form::text('empresa', null,['id' => 'empresaUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email_contact', 'Email contacto') }}
                        {{ Form::text('email_contact', null,['id' => 'email_contactUp', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('tel_contact', 'Telefono contact') }}
                        {{ Form::text('tel_contact', null,['id' => 'tel_contactUp', 'class' => 'form-control']) }}
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
    <script type="text/javascript" src="{{ asset('js/admin-proveedor.js') }}"></script>
@show