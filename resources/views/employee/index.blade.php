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
                                                <td>{{ $employee->departament }}</td>
                                                <td>
                                                    <!-- Ver -->
                                                    <a href="#" class="badge badge-success detail" title="Vér" data-toggle="modal" data-idEmployee="{{ $employee->id }}" data-empURL="{{ url('/employees/' . $employee->id) }}" data-target="#modal-defaultShow"><i class="fas fa-eye"></i></a>
                                                    <!-- Editar -->
                                                    <a href="#" class="badge badge-primary editEmployee" title="Editar" data-toggle="modal" data-target="#modal-defaultEdit" data-idEmployee="{{ $employee->id }}" data-empURL="{{ url('/employees/' . $employee->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    <!-- Eliminar -->
                                                    <a href="#" class="badge badge-danger deleteEmployee" title="Eliminar" data-idEmployee="{{ $employee->id }}" data-empURL="{{ url('/employees/' . $employee->id) }}"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if(count($employees))
                                <div class="mt-2 mx-auto">
                                    {{ $employees->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
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
                                    <button type="button" class="close" id="close" name="close" data-dismiss="modal" aria-label="Close">
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
                                                        <option value="" selected disabled>Tipo documento</option>
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
                                                    <select name="selTipoDepartament" id="selTipoDepartament" class="form-control" required>
                                                        <option value="" selected disabled>Seleccione Area</option>
                                                        @foreach ($departaments as $departament)
                                                            <option value="{{ $departament->id }}">{{ $departament->departament }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" id="close2" name="close2" class="btn btn-danger" data-dismiss="modal">Salir</button>
                                        <button type="submit" class="btn btn-primary">Crear empleado</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- END MODAL ADD EMPLOYEE -->
                <!-- MODAL SHOW EMPLOYEE -->
                    <div class="modal fade" id="modal-defaultShow">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Información del Empleado</h4>
                                    <button type="button" class="close" id="close3" name="close3" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                                    </div>
                                                    <input type="text" name="selTipoDocShow" id="selTipoDocShow" class="form-control" placeholder="Tipo documento" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Numero Doc" id="txtNumDocShow" name="txtNumDocShow" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Nombres" id="txtNameShow" name="txtNameShow" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Apellidos" id="txtLastnameShow" name="txtLastnameShow" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Fecha Nac" id="txtDateBirthShow" name="txtDateBirthShow" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                                    </div>
                                                    <!--<input type="text" name="selTipoDepartamentShow" id="selTipoDepartamentShow" class="form-control" placeholder="Departamento" readonly>-->
                                                    <select name="selTipoDepartamentShow" id="selTipoDepartamentShow" class="form-control" disabled>
                                                        <option value="">Seleccione Area</option>
                                                        @foreach ($departaments as $departament)
                                                            <option value="{{ $departament->id }}">{{ $departament->departament }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" id="close4" name="close4" class="btn btn-danger" data-dismiss="modal">Salir</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                <!-- END MODAL SHOW EMPLOYEE -->
                <!-- MODAL EDIT EMPLOYEE -->
                    <div class="modal fade" id="modal-defaultEdit">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Empleado</h4>
                                    <button type="button" class="close" id="close5" name="close5" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="#" method="POST" id="formEditEmployee" name="formEditEmployee" onSubmit="return false;">
                                    <div class="modal-body">
                                        <div class="row">
                                            @method('put')
                                            <input type="hidden" id="urlEditEmployee" name="urlEditEmployee" class="form-control" placeholder="URL">
                                            {{ method_field('put') }}
                                            <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
                                                    </div>
                                                    <select name="selTipoDocEdit" id="selTipoDocEdit" class="form-control" required>
                                                        <option value="" disabled>Tipo documento</option>
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
                                                    <input type="text" class="form-control" placeholder="Numero Doc" id="txtNumDocEdit" name="txtNumDocEdit" required minlength="4" maxlength="13">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Nombres" id="txtNameEdit" name="txtNameEdit" required minlength="4" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Apellidos" id="txtLastnameEdit" name="txtLastnameEdit" required minlength="4" maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Fecha Nac" id="txtDateBirthEdit" name="txtDateBirthEdit" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                                                    </div>
                                                    <select name="selTipoDepartamentEdit" id="selTipoDepartamentEdit" class="form-control" required>
                                                        <option value="" disabled>Seleccione Area</option>
                                                        @foreach ($departaments as $departament)
                                                            <option value="{{ $departament->id }}">{{ $departament->departament }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" id="close6" name="close6" class="btn btn-danger" data-dismiss="modal">Salir</button>
                                        <button type="submit" class="btn btn-primary">Editar empleado</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- END MODAL EDIT EMPLOYEE -->
            </div>
        </section>
    @endsection