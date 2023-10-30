<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LibroPruebaModuloE extends Model
{
    protected $table = 'libro_prueba_me';
    protected $fillable = [
        'simulacro',
        'sesion',
        'area',
        'alumno',
        'puntuacion',
        'n_preguntas',
        'resp_preguntas',
        'fecha_presentacion',
        'tiempo_usado',
        'estado',
    ];

    public static function Guardar($datos, $respviejo, $resp, $fecha)
    {

        
        $Alumno = Auth::user()->id;
        $IdSesion = $datos['IdSesion'];
        $idSimulacro = $datos['idSimulacro'];
        $IdArea = $datos['IdArea'];
        $puntMaxi = $datos['CantiPreg'];
        $pregContestada = $datos['prgAct'];
      

        $competencia =$datos["competencia"];
        $componente =$datos["componente"];

        if ($datos['PosPreg'] === "Ultima") {
            $estado = "TERMINADA";
        } else {
            $estado = "EN PROCESO";
        }



        $LibroPrueba = self::BusPruebaArea($Alumno, $IdSesion, $IdArea);

        if ($LibroPrueba) {
            $puntaje = $LibroPrueba->puntuacion;
        } else {
            $puntaje = 0;
        }

   
        if ($datos['partePreg'] == "PARTE 1") {
            $DesOpcPreg = PreguntasParte1::ConsultarPregParte($resp->pregunta);
               
            if($DesOpcPreg->respuesta==$resp->respuesta){
                $puntaje = (int) $puntaje + 1;
                $PunPreg = \App\PuntPregMEPruebaSimulacro::Guardar($IdSesion, $IdArea, $resp->pregunta, '1',$datos['partePreg'],$competencia,$componente,$idSimulacro);
            }else{
                $PunPreg = \App\PuntPregMEPruebaSimulacro::Guardar($IdSesion, $IdArea, $resp->pregunta, '0',$datos['partePreg'],$competencia,$componente,$idSimulacro);
            }


        } else {
            $DesOpcPreg = OpcPregMulModuloE::where('pregunta', $resp->pregunta)
                ->get();

                foreach ($DesOpcPreg as $OP) {
                    if ($OP->id == $resp->respuesta) {
                        if ($OP->correcta == "si") {
                            $puntaje = (int) $puntaje + 1;
                            $PunPreg = \App\PuntPregMEPruebaSimulacro::Guardar($IdSesion, $IdArea, $resp->pregunta, '1',$datos['partePreg'],$competencia,$componente,$idSimulacro);
                        } else {
                            $PunPreg = \App\PuntPregMEPruebaSimulacro::Guardar($IdSesion, $IdArea, $resp->pregunta, '0',$datos['partePreg'],$competencia,$componente,$idSimulacro);
                        }
                    }
                }
        }

       

        if ($datos['PosPreg'] == "Ultima") {
            $estado = "TERMINADA";
        }

        $puntaje = 0;

        $PunPreg = \App\PuntPregMEPruebaSimulacro::ConsulPunt($IdSesion, $IdArea, Auth::user()->id);
        foreach ($PunPreg as $PunP) {
            $puntaje = (int) $puntaje + (int) $PunP->puntos;
        }


        return LibroPruebaModuloE::updateOrCreate([
            'alumno' => $Alumno, 'sesion' => $IdSesion, 'area' => $IdArea,
        ], [
            'simulacro' => $idSimulacro,
            'sesion' => $IdSesion,
            'area' => $IdArea,
            'alumno' => $Alumno,
            'puntuacion' => $puntaje,
            'n_preguntas' => $puntMaxi,
            'resp_preguntas' => $pregContestada,
            'fecha_presentacion' => $fecha,
            'tiempo_usado' => $datos["TiempoxSesion"],
            'estado' => $estado,
        ]);
    }

    public static function GuardarInfTiempo($datos)
    {

        $Alumno = Auth::user()->id;
        $IdSesion = $datos['idSes'];
        $idSimulacro = $datos['idSimulacro'];
       
        $estado = "TERMINADA";

        foreach ($datos["idArea"] as $key => $val) {
            $fecha = date('Y-m-d  H:i:s');
            $DesPrueba = LibroPruebaModuloE::where('sesion', $datos['idSes'])
                ->where("area", $datos["idArea"][$key])
                ->where("alumno", Auth::user()->id)
                ->first();

            if (!$DesPrueba) {
                return LibroPruebaModuloE::updateOrCreate(['alumno' => $Alumno, 'sesion' => $IdSesion, 'area' => $datos["idArea"][$key]], [
                    'simulacro' => $idSimulacro,
                    'sesion' => $IdSesion,
                    'area' => $datos["idArea"][$key],
                    'alumno' => $Alumno,
                    'puntuacion' => '0',
                    'n_preguntas' => $datos["npreg"][$key],
                    'resp_preguntas' => '0',
                    'fecha_presentacion' => $fecha,
                    'tiempo_usado' => $datos["TiempoxSesion"],
                    'estado' => $estado,
                ]);
            } else {
                $respuesta = LibroPruebaModuloE::where(['alumno' => $Alumno, 'sesion' => $IdSesion, 'area' => $datos["idArea"][$key]])->update([
                    'estado' => $estado
                ]);
                return $respuesta;
            }
        }
    }

    public static function buscarEstud($idSimu)
    {
        $DesPrueba = LibroPruebaModuloE::join('alumnos', 'alumnos.usuario_alumno', 'libro_prueba_me.alumno')
            ->where("simulacro", $idSimu)
            ->where("alumnos.estado_alumno", 'ACTIVO')
            ->groupBy('alumnos.usuario_alumno')
            ->get();
        return $DesPrueba;
    }

    public static function buscarTimpoSesion($idSimu){
        $DetSesion = DB::connection("mysql")->select("SELECT ame.nombre_area area, SUM(lpm.tiempo_usado) AS tiempo
        FROM  libro_prueba_me lpm LEFT JOIN areas_me ame ON lpm.area=ame.id
        WHERE lpm.simulacro=".$idSimu."
        GROUP BY lpm.area");
         return $DetSesion;
    }

    public static function BusPruebaArea($Alum, $IdSesion, $IdArea)
    {
        $DesPrueba = LibroPruebaModuloE::where('sesion', $IdSesion)
            ->where("area", $IdArea)
            ->where("alumno", $Alum)
            ->first();
        return $DesPrueba;
    }

    public static function VaciarRegistros()
    {
        $Respuesta = LibroPruebaModuloE::truncate();
        return $Respuesta;
    }
}
