<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    //
    public function index(){
        $registro = Asistencia::orderBy('fecha', 'desc')->get();
        return view('registro_horarios.index', compact('registro'));
    }
      public function store(Request $request){

        $request-> validate([
            'fecha'=>'required|date',
            'hora_entrada'=>'required',
        ]);
        RegistroHorario::create([
            'usuario_id'=>auth()->user()->id,
            'fecha'=>$request->fecha,
            'hora_entrada'=>$request->hora_entrada,
            'hora_salida'=>$request->hora_salida,
        ]);
        return redirect()->back()->with('success', 'Hora de entrada registrada correctamente.');
    }
}


