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
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-info" role="button">Editar</a>
                            <a href="#" class="btn btn-danger" role="button">Eliminar</a>
                        </div>
                    </td>
                </tr>
            </table>
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
                    <p>Formulario</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

@endsection