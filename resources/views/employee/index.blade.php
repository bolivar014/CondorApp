@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-user"></i> Empleados</h1>
    @endsection

    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title">Lista de Empleados</h3>
                                    </div>
                                    <div class="col-6" style="right: 0!important; position: absolute; display:flex; justify-content: end;">
                                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Agregar Empleado</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th style="width: 240px">Nombre</th>
                                            <th style="width: 130px">Departamento</th>
                                            <th style="width: 70px">&nbsp;&nbsp;Opciones&nbsp;&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->id }}</td>
                                                <td>{{ $employee->name . " " . $employee->lastname }}</td>
                                                <td>{{ $employee->departament_id }}</td>
                                                <td>
                                                    <!-- Ver -->
                                                    <a href="#" class="badge badge-success" title="Vér"><i class="fas fa-eye"></i></a>
                                                    <!-- Editar -->
                                                    <a href="#" class="badge badge-primary" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                                    <!-- Eliminar
                                                    <a href="{{ url('') }}" class="badge badge-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a> -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- MODAL ADD EMPLOYEE -->
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Agregar Empleado</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/employees') }}" method="POST" id="formCreateEmployee" name="formCreateEmployee" onSubmit="return false;">
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                                    </div>
                                                    <select name="selTipoDoc" id="selTipoDoc" class="form-control" required>
                                                        <option value="">Tipo documento</option>
                                                        <option value="1">CC</option>
                                                        <option value="2">Cedula Extranjería</option>
                                                        <option value="3">Pasaporte</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Numero Doc" id="txtNumDoc" name="txtNumDoc" required minlength="4" maxlength="13">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Nombres" id="txtName" name="txtName" required minlength="4" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Apellidos" id="txtLastname" name="txtLastname" required minlength="4" maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Fecha Nac" id="txtDateBirth" name="txtDateBirth" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                                    </div>
                                                    <select name="selTipoDoc" id="selTipoDoc" class="form-control" required>
                                                        <option value="">Seleccione Area</option>
                                                        <option value="1">Calidad</option>
                                                        <option value="2">Comercial</option>
                                                        <option value="3">Contabilidad</option>
                                                        <option value="4">Financiera</option>
                                                        <option value="5">RRHH</option>
                                                        <option value="6">Servicios Generales</option>
                                                        <option value="7">Sistemas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                                        <button type="submit" class="btn btn-primary">Crear empleado</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- END MODAL ADD EMPLOYEE -->
            </div>
        </section>
    @endsection