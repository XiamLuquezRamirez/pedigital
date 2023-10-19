<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreasModE extends Model
{
    protected $table = 'areas_me';
    protected $fillable = [
        'nombre_area',
        'estado'
    ];

        
    public static function Buscar($id) {
        $Areas = AreasModE::where('id', $id)
                ->where('estado', "ACTIVO")
                ->first();
        return $Areas;
    }
    public static function listar() {
        $Areas = AreasModE::where('estado', "ACTIVO")
                ->get();
        return $Areas;
    }
}
