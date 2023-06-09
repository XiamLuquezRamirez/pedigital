<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetaSesionesSimul extends Model
{

    protected $table = 'me_sesiones_simulacros';
    protected $fillable = [
        'id_simulacro',
        'sesion',
        'num_preguntas',
        'tiempo_sesion',
        'estado',
    ];

    public static function Guardar($datos)
    {
        return DetaSesionesSimul::create([
            'id_simulacro' => $datos['Id_Simu'],
            'sesion' => $datos['DescSesion'],
            'num_preguntas' => "",
            'tiempo_sesion' => $datos['TSesion'],
            'estado' => "ACTIVO",
        ]);
    }
    public static function ModificaDatos($idSesion, $Des, $tiempo)
    {
        $respuesta = DetaSesionesSimul::where(['id' => $idSesion])->update([
            'sesion' => $Des,
            'tiempo_sesion' => $tiempo,
        ]);

        return $respuesta;
    }

    public static function ConsultarSesiones($simu)
    {   
        $DetSesiones = DetaSesionesSimul::leftJoin('me_sesiones_alumnos', function ($join) {
            $join->on('me_sesiones_alumnos.sesion', '=', 'me_sesiones_simulacros.id')
                ->where('me_sesiones_alumnos.alumno', '=', Auth::user()->id);
        })
            ->where('me_sesiones_simulacros.id_simulacro', $simu)
            ->where('me_sesiones_simulacros.estado', "ACTIVO")
            ->select('me_sesiones_simulacros.id', 'me_sesiones_simulacros.id_simulacro', 'me_sesiones_simulacros.sesion', 'me_sesiones_simulacros.num_preguntas', 'me_sesiones_simulacros.tiempo_sesion', 'me_sesiones_alumnos.estado')
            ->get();
        return $DetSesiones;
    }

    public static function ConsultarSesion($sesion)
    {
        $DetSesion = DB::connection("mysql")->select("SELECT mss.id,mss.sesion, mss.num_preguntas, mss.tiempo_sesion,msa.alumno, msa.estado FROM me_sesiones_simulacros mss LEFT JOIN me_sesiones_alumnos msa ON mss.id=msa.sesion  AND msa.alumno=".Auth::user()->id." LEFT JOIN alumnos alum ON msa.alumno=alum.usuario_alumno  WHERE mss.id = '".$sesion."'");
        return $DetSesion[0];

    }
    public static function ConsultarAreasSimulacro($simu)
    {
        $DetSesion = DB::connection("mysql")->select("SELECT sa.area, a.nombre_area, SUM(npreguntas) npreg FROM me_sesiones_simulacros mss"
        ." RIGHT JOIN sesion_area sa ON mss.id=sa.sesion"
        ." LEFT JOIN  areas_me a ON sa.area=a.id"
        ." WHERE mss.id_simulacro=".$simu.""
        ." GROUP BY sa.area");
        return $DetSesion;

    }
    public static function ConsultarAreasSimulacroxArea($simu,$area)
    {
        $DetSesion = DB::connection("mysql")->select("SELECT sa.area, a.nombre_area, SUM(npreguntas) npreg FROM me_sesiones_simulacros mss"
        ." RIGHT JOIN sesion_area sa ON mss.id=sa.sesion"
        ." LEFT JOIN  areas_me a ON sa.area=a.id"
        ." WHERE mss.id_simulacro=".$simu." AND sa.area=".$area.""
        ." GROUP BY sa.area");
        return $DetSesion;

    }



    public static function Modificar($Sesion, $npreg)
    {
        $respuesta = DetaSesionesSimul::where(['id' => $Sesion])->update([
            'num_preguntas' => $npreg,
        ]);
        return $respuesta;
    }

    public static function Eliminar($Id)
    {

        $Are = DetaSesionesSimul::where('id', $Id);
        $Are->delete();
        return "1";
    }


  
}
