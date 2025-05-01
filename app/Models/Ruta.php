<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    public function orden(){
        $this->belongsTo(Orden::class);
    }

    public function conductor(){
        $this->belongsTo(Conductor::class);
    }

    public function ubicacion(){
        $this->hasOne(Ubicacion::class);
    }
}
