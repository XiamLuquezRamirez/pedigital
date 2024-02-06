<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsUrl extends Model
{

    protected $table = 'para_generales';
    protected $fillable = [
        'url',
        'mod_asig',
        'mod_modu',
        'mod_zona',
        'mod_labo',
        'mod_entre',
        'mod_juego',
        'mod_etno',
        'colegio',

    ];

    public static function ConsulUrl($Plat)
    {
        $ImgAig = ConsUrl::where('plataf', $Plat)
            ->first();
        return $ImgAig;
    }

    public static function ConsulPar($Plat)
    {
        $Parametros = ConsUrl::where('plataf', $Plat)
            ->first();
        return $Parametros;
    }

    public static function Consultar()
    {
        $Parametros = ConsUrl::get();
        return $Parametros;
    }

    public static function UpdatePara($data)
    {
        $ModA = 'no';
        $ModT = 'no';
        $ModE = 'no';
        $ModJ = 'no';
        $Labo = 'no';
        $ZonL = 'no';
        $EPED = 'no';

        if (!empty($data["check_otros"])) {
            foreach ($data["check_otros"] as $key => $val) {
                if ($data["check_otros"][$key] == "ModE") {
                    $ModE = 'si';
                }
                if ($data["check_otros"][$key] == "ModJ") {
                    $ModJ = 'si';
                }
                
                if ($data["check_otros"][$key] == "Labo") {
                    $Labo = 'si';
                }

                if ($data["check_otros"][$key] == "ZonL") {
                    $ZonL = 'si';
                }
                
                if ($data["check_otros"][$key] == "Asig") {
                    $ModA = 'si';
                }

                if ($data["check_otros"][$key] == "Modu") {
                    $ModT = 'si';
                }

                if ($data["check_otros"][$key] == "ModEP") {
                    $EPED = 'si';
                }


            }
        }

        $respuesta = ConsUrl::where(['id' => '2'])->update([
            'url' => $data['url-pedigital'],
            'mod_asig' => $ModA,
            'mod_modu' => $ModT,
            'mod_zona' => $ZonL,
            'mod_labo' => $Labo,
            'mod_entre' => $ModE,
            'mod_juego' => $ModJ,
            'mod_etno' => $EPED,
            'colegio' => $data['institucion'],
        ]);

        $respuesta = ConsUrl::where(['id' => '1'])->update([
            'url' => $data['url-pedigital-kid'],
            'mod_asig' => $ModA,
            'mod_modu' => $ModT,
            'mod_zona' => $ZonL,
            'mod_labo' => $Labo,
            'mod_entre' => $ModE,
            'mod_juego' => $ModJ,
            'mod_etno' => $EPED,
            'colegio' => $data['institucion'],
        ]);

        $respuesta = ConsUrl::where(['id' => '3'])->update([
            'url' => $data['url-pedigital-etno'],
            'mod_asig' => $ModA,
            'mod_modu' => $ModT,
            'mod_zona' => $ZonL,
            'mod_labo' => $Labo,
            'mod_entre' => $ModE,
            'mod_juego' => $ModJ,
            'mod_etno' => $EPED,
            'colegio' => $data['institucion'],
        ]);

        return $respuesta;

    }
}