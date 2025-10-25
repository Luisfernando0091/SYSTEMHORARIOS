<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroHorario extends Model
{
    //
    use HasFactory;
    protected $table = 'registros_horarios';
    protected $fillable = [
        'usuario_id',
        'fecha',
        'hora_entrada',
        'hora_salida',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
