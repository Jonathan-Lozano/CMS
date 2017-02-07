@extends('layouts.master-page')

@section('content')

    <div class="page-header">
        <h1>Registrar nuevo usuario</h1>
        <div class="panel-body">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li class="active">Registrar</li>
            </ol>
        </div>
    </div>


    <div class="container">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Nuevo usuario</h3>
            </div>

            <div class="panel-body">

                <form class="form-horizontal">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Sign in</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>

            </div>

        </div>


    </div>

@endsection
