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
                                        <a href="#" class="btn btn-success"><i class="fas fa-plus"></i> Agregar Departamento</a>
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
                                                    <a href="#" class="badge badge-primary" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                                    <!-- Eliminar
                                                    <a href="#" class="badge badge-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a> -->
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
            </div>
        </section>
    @endsection