<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SesionAlumnos extends Model
{
    protected $table = 'me_sesiones_alumnos';
    protected $fillable = [
        'sesion',
        'alumno',
        'estado',
    ];

    public static function Guardar($datos)
    {
        return SesionAlumnos::create([
            'sesion' => $datos['idSes'],
            'alumno' => Auth::user()->id,
            'estado' => "INICIADA",
        ]);

    }

    public static function Editar($datos)
    {
        $respuesta = SesionAlumnos::where(['sesion' => $datos['idSes']])->update([
            'estado' => "FINALIZADA",
        ]);
        return $respuesta;

    }

    public static function Consultar($datos)
    {
        $respuesta = SesionAlumnos::where("sesion", $datos['idSes'])
            ->where("alumno", Auth::user()->id);
        return $respuesta;
    }

    public static function Verifsesion($ses)
    {
        $respuesta = SesionAlumnos::where("sesion", $ses)
        ->get();
        return $respuesta;
    }
    public static function ConsultarTodo($datos)
    {

        $respuesta = DB::connection("mysql")->select("SELECT * FROM  me_sesiones_alumnos saa RIGHT JOIN sesion_area sa ON saa.sesion=sa.id AND alumno=".Auth::user()->id." WHERE simulacro=".$datos['idSimula']);
        return $respuesta;
    }

}
