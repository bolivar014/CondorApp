@extends('layouts.base')
    @section('title-content')
        <h1 class="m-0"><i class="fas fa-network-wired"></i> Departamentos</h1>
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
                                        <h3 class="card-title">Lista de departamentos</h3>
                                    </div>
                                    <div class="col-6" style="right: 0!important; position: absolute; display:flex; justify-content: end;">
                                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Agregar Departamento</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Departamento</th>
                                            <th>Fecha Creación</th>
                                            <th style="width: 70px">&nbsp;&nbsp;Opciones&nbsp;&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departaments as $departament)
                                            <tr>
                                                <td>{{ $departament->id }}</td>
                                                <td>{{ $departament->departament }}</td>
                                                <td>{{ $departament->created_at }}</td>
                                                <td>
                                                    <!-- Ver -->
                                                    <a href="#" class="badge badge-success" title="Vér"><i class="fas fa-eye"></i></a>
                                                    <!-- Editar -->
                                                    <a href="#" class="badge badge-primary editDepartament" title="Editar" data-toggle="modal" data-target="#modal-defaultEdit" data-idDepartament="{{ $departament->id }}" data-empURL="{{ url('/departaments/' . $departament->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            @if(count($departaments))
                                <div class="mt-2 mx-auto">
                                    {{ $departaments->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- MODAL ADD DEPARTAMENT -->
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Agregar Departamento</h4>
                                    <button type="button" class="close" id="close7" name="close7" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/departaments') }}" method="POST" id="formCreateDepartament" name="formCreateDepartament" onSubmit="return false;">
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Nombre departamento" id="txtNameDepartament" name="txtNameDepartament" required minlength="4" maxlength="45">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" id="close8" name="close8" class="btn btn-danger" data-dismiss="modal">Salir</button>
                                        <button type="submit" class="btn btn-primary">Crear departamento</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- END MODAL ADD DEPARTAMENT -->
                <!-- MODAL EDIT DEPARTAMENT -->
                    <div class="modal fade" id="modal-defaultEdit">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Departamento</h4>
                                    <button type="button" class="close" id="close7" name="close7" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="#" method="POST" id="formEditDepartament" name="formEditDepartament" onSubmit="return false;">
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Nombre departamento" id="txtNameDepartamentEdit" name="txtNameDepartamentEdit" required minlength="4" maxlength="45">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" id="close8" name="close8" class="btn btn-danger" data-dismiss="modal">Salir</button>
                                        <button type="submit" class="btn btn-primary">Editar departamento</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- END MODAL EDIT DEPARTAMENT -->
            </div>
        </section>
    @endsection