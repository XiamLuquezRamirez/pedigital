<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;

class Comentarios extends Model
{
    protected $table = 'comentarios';
    protected $fillable = [
        'comentario',
        'id_foro',
        'id_usuario',
        'estado_comentarios'
    ];

    public static function Guardar($data)
    {
        return Comentarios::create([
            'comentario' => $data['Comentario'],
            'id_foro' => $data['idForo'],
            'id_usuario' => Auth::user()->id,
            'estado_comentarios' => 'ACTIVO'
        ]);
    }

    public static function listar($id)
    {
        return Comentarios::join('users', 'users.id', 'comentarios.id_usuario')
            ->where('estado_comentarios', 'Activo')
            ->where('id_foro', $id)
            ->select('comentarios.*','users.nombre_usuario', 'users.tipo_usuario', 'users.id AS idusu')
            ->orderBy('id', 'Desc')
            ->get();
    }

    public static function VaciarRegistros(){
        $Respuesta = Comentarios::truncate();
        return $Respuesta;
     }
}
