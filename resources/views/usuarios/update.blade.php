@extends('Admin.dashboard')
@section('content')

<div class="container">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mi Perfil</h6>
    </div>
    
    {{-- Muestra el mensaje de éxito si la validación pasó --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    {{-- Muestra los errores de validación si existen --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <h6>Errores de Validación:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('usuarios.perfil.update') }}">
        @csrf
        @method('PUT') 

        {{-- CAMPO: Nombre --}}
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        
        {{-- CAMPO: Apellido --}}
        <div class="form-group">
            <label for="lastname">Apellido</label>
            <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', $user->lastname) }}" required>
            @error('lastname')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        
        {{-- ✅ CAMPO FALTANTE: Nombre de Usuario --}}
        <div class="form-group">
            <label for="username">Nombre de Usuario</label>
            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" required>
            @error('username')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        
        {{-- CAMPO: DNI --}}
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror" value="{{ old('dni', $user->dni) }}">
            {{-- DNI lo haré opcional si no era requerido en el back-end --}}
            @error('dni')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        {{-- CAMPO: Email --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
            @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        
        {{-- CAMPO: Celular --}}
        <div class="form-group">
            <label for="phone">Celular</label>
            <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">
            {{-- Celular lo haré opcional si no era requerido en el back-end --}}
            @error('phone')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        
        <hr>
        
        <h3>Cambiar Contraseña (Opcional)</h3>
        {{-- CAMPO: Contraseña --}}
        <div class="form-group">
            <label for="password">Nueva Contraseña</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        {{-- CAMPO: Confirmar Contraseña --}}
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </form>
</div>
@endsection
