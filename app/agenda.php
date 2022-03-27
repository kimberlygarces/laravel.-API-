<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
        //clase que extiende del modelo - pasamos los campos van hacer llenados por el modelo hacia la BD
        protected $fillable = ["asunto","fecha","hora","estado", "cliente_id"];
}
