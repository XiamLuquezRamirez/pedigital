<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class simulacrosEstudiantes extends Model
{
    protected $table = 'simulacro_estudiante';
    protected $fillable = [
        'simulacro',
        'estudiante',
        'estado',
    ];

    public static function BuscarEstudiante($idSimu){
        $Alumnos = DB::connection("mysql")->select("SELECT estudiante FROM simulacro_estudiante se
        where se.simulacro=".$idSimu." and  se.estado='TERMINADO'");
        return $Alumnos;
    }

    public static function guardar($datos){
        return simulacrosEstudiantes::create([
            'simulacro' => $datos['idSimula'],
            'estudiante' => Auth::user()->id,
            'estado' => "TERMINADO",
        ]);
    }


}
