@extends('Admin.dashboard')
@section('content')
    <!-- Page Heading -->
    {{-- LISTA DE USUARIOS --}}
    {{-- <h1 class="h3 mb-2 text-gray-800">Lista de Usuarios</h1>
    <p class="mb-4">Aquí puedes ver todos los usuarios registrados en el sistema.</p>

    <!-- DataTales Example --> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios Registrados</h6>
            <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-success">+ Nuevo Usuario</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                {{-- <td>{{ $usuario->id }}</td> --}}
                                <td>{{ $usuario->name }} {{ $usuario->lastname }}</td>
                                <td>{{ $usuario->username }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->phone }}</td>
                                <td>
                                    @foreach($usuario->roles as $role)
                                        <span class="badge badge-success">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
<a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm">Editar</a>   
                              <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
