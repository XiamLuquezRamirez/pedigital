<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntasParte1 extends Model
{
    protected $table = 'preguntas_parte1';
    protected $fillable = [
        'parte',
        'pregunta',
        'respuesta',
    ];

    public static function Guardar($datos, $Parte,$banco)
    {
        $conse=1;
        foreach ($datos["Pregunta"] as $key => $val) {
            $respuesta = PreguntasParte1::create([
                'parte' => $Parte,
                'pregunta' => $datos["Pregunta"][$key],
                'respuesta' => $datos["cb_respuesta"][$key],
            ]);

        }
        return $respuesta;
    }

    public static function ConsultarPreg($preg)
    {
        $Preguntas = PreguntasParte1::where('parte', $preg)
            ->get();
        return $Preguntas;
    }

    public static function ConsultarPregParte($preg)
    {
        $Preguntas = PreguntasParte1::where('id', $preg)
            ->first();
        return $Preguntas;
    }

    public static function Modificar($datos, $idPreg){
        $Preg = PreguntasParte1::where('parte', $idPreg);
        $Preg->delete();

        foreach ($datos["Pregunta"] as $key => $val) {
            $respuesta = PreguntasParte1::create([
                'parte' => $idPreg,
                'pregunta' => $datos["Pregunta"][$key],
                'respuesta' => $datos["cb_respuesta"][$key],
            ]);
        }
        return $respuesta;

    }

    public static function BuscOpcRespPruebaParte($id,$Est,$ses)
    {
        $DesOpcPreg = PreguntasParte1::join('resp_pregmultiple_me_prueba', 'resp_pregmultiple_me_prueba.pregunta', 'preguntas_parte1.id')
            ->select('preguntas_parte1.id', 'preguntas_parte1.respuesta', 'resp_pregmultiple_me_prueba.respuesta AS resp_alumno')
            ->where('resp_pregmultiple_me_prueba.pregunta', $id)
            ->where('resp_pregmultiple_me_prueba.alumno', $Est)
            ->where('resp_pregmultiple_me_prueba.sesion', $ses)
            ->first();
        return $DesOpcPreg;
    }


    public static function DelPreg($id){
        $Preg = PreguntasParte1::where('parte', $id);
        $Preg->delete();
        return "ok";
    }

}
