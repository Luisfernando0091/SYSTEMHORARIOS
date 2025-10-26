@extends('Admin.dashboard')
@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8"> {{-- ancho como en la imagen --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registrar Usuario</h6>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- Errores de validación --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Apellido:</label>
                            <input id="lastname" name="lastname" value="{{ old('lastname') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="username">Usuario:</label>
                            <input id="username" name="username" value="{{ old('username') }}" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="dni">DNI:</label>
                            <input id="dni" name="dni" value="{{ old('dni') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo:</label>
                            <input id="email" name="email" value="{{ old('email') }}" type="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Teléfono:</label>
                            <input id="phone" name="phone" value="{{ old('phone') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="role">Rol:</label>
                            <select id="role" name="role" class="form-control" required>
                                <option value="" disabled {{ old('role') ? '' : 'selected' }}>Selecciona el rol</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input id="password" name="password" type="password" class="form-control" required>
                        </div>

                        <div class="text-right">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary mr-2">Cancelar</a>
                            <button class="btn btn-primary">Registrar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
