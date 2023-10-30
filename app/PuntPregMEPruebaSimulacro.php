<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PuntPregMEPruebaSimulacro extends Model
{
    protected $table = 'puntuacion_preguntas_me_prueba';
    protected $fillable = [
        'sesion',
        'area',
        'pregunta',
        'alumno',
        'puntos',
        'parte',
        'competencia',
        'componente',
        'simulacro'
    ];

    public static function Guardar($IdSesion, $IdArea, $preg, $puntos,$parte,$compe,$compo)
    {

        $Opc = PuntPregMEPruebaSimulacro::where('pregunta', $preg)
            ->where('sesion', $IdSesion)
            ->where('alumno', Auth::user()->id)
            ->where('area', $IdArea)
            ->first();
        if ($Opc) {
            $Opc->delete();
        }

        return PuntPregMEPruebaSimulacro::create([
            'sesion' => $IdSesion,
            'area' => $IdArea,
            'pregunta' => $preg,
            'alumno' => Auth::user()->id,
            'puntos' => $puntos,
            'parte' => $parte,
            'competencia' => $compe,
            'componente' => $compo
        ]);

    }


    public static function VaciarRegistros()
    {
        $Respuesta = PuntPregMEPruebaSimulacro::truncate();
        return $Respuesta;
    }



    public static function ConsulPunt($IdSesion, $IdArea, $alum)
    {
        $Opc = PuntPregMEPruebaSimulacro::where('sesion', $IdSesion)
            ->where('area', $IdArea)
            ->where('alumno', $alum)
            ->get();
        return $Opc;
    }

    public static function ConsulPuntAlumno($IdArea,$Idsimu,$alum)
    {
        $DetSesion = DB::connection("mysql")->select("SELECT SUM(puntos) pts FROM  puntuacion_preguntas_me_prueba ppme "
       ." LEFT JOIN  me_sesiones_simulacros mss ON ppme.sesion=mss.id"
       ." WHERE ppme.alumno=".$alum." AND mss.id_simulacro=".$Idsimu." AND ppme.area=".$IdArea."");
        return $DetSesion[0];
    }

    public static function puntCompEst($idSimu, $competencia,$est){
        $PuntcompEst = DB::connection("mysql")->select("SELECT ppp.competencia, CONCAT(alum.apellido_alumno,' ',nombre_alumno) nombre, SUM(ppp.puntos) puntos FROM `puntuacion_preguntas_me_prueba` ppp
        LEFT JOIN alumnos alum ON alum.usuario_alumno=ppp.alumno
        WHERE ppp.simulacro=".$idSimu." AND ppp.competencia =".$competencia." AND ppp.alumno=".$est."
        GROUP BY ppp.alumno");
         return $PuntcompEst;
    }

    public static function puntCompoEst($idSimu, $componente,$est){
        $PuntcompEst = DB::connection("mysql")->select("SELECT ppp.componente, CONCAT(alum.apellido_alumno,' ',nombre_alumno) nombre, SUM(ppp.puntos) puntos FROM `puntuacion_preguntas_me_prueba` ppp
        LEFT JOIN alumnos alum ON alum.usuario_alumno=ppp.alumno
        WHERE ppp.simulacro=".$idSimu." AND ppp.componente =".$componente." AND ppp.alumno=".$est."
        GROUP BY ppp.alumno");
         return $PuntcompEst;
    }

}
