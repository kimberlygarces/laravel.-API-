<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    // pasa los campos que seran adminsitrados por el modelo CLIENTES A LA BD clientes
    
    protected $fillable = ["nombre","cedula","cumple"];
}
