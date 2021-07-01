<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;
    //en la siguiente linea pongo todos los datos que quiera pasar por parametros en el metodo de store(). Si no lo pongo aqui, por cuestiones de seguridad no me deja pasarlo por parametros
    protected $fillable = ['nombre', 'categoria', 'plataforma', 'precio', 'portada', 'descripcion', 'user_id'];

    //relacion 1 a muchos
    public function user(){
        return $this->belongsTo(User::class);
    }
}
