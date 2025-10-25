@extends('layouts.app')

{{-- Define el título de la página que se muestra en la pestaña del navegador --}}
@section('title', 'Registro de Horarios') 

{{-- ¡CORRECCIÓN CLAVE! Debe ser 'content' (minúsculas) para coincidir con el @yield de layouts/app.blade.php --}}
@section('content') 

<div class="container">
<h1 class="h3 mb-4 text-gray-800">Registro de Horarios</h1>

{{-- Muestra mensajes de éxito después de registrar --}}
@if(session('success')) 
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    
    <form action="{{ route('registros.store') }}" method="post">

      @csrf {{-- ¡Obligatorio para formularios POST en Laravel! --}}
      
      {{-- Campo Fecha --}}
      <div class="form-group"> 
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>
      </div>

      {{-- Campo Hora de Entrada --}}
      <div class="form-group">
        <label for="hora_entrada">Hora de Entrada</label>
        <input type="time" name="hora_entrada" id="hora_entrada" class="form-control" required>
      </div>
      
      {{-- Campo Hora de Salida (Opcional, no 'required') --}}
      <div class="form-group">
        <label for="hora_salida">Hora de Salida</label>
        <input type="time" name="hora_salida" id="hora_salida" class="form-control"> 
      </div>
      
      <button type="submit" class="btn btn-primary mt-2">Registrar Horario</button>
    </form>

    <hr>
    
    {{-- Historial de Registros --}}
    <h5 class="mt-4">Historial de Registro</h5>
    <table class="table table-bordered mt-2"> 
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Hora de Entrada</th>
          <th>Hora de Salida</th>
          <th>Usuario ID</th>
        </tr>
      </thead>
      <tbody>
        @foreach($registro as $item) 
        <tr>
          <td>{{ $item->fecha }}</td>
          <td>{{ $item->hora_entrada }}</td>
          <td>{{ $item->hora_salida ?? 'Pendiente' }}</td>
          <td>{{ $item->user_id }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection
