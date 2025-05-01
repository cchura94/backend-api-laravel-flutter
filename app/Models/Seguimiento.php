<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    public function orden(){
        return $this->belongsTo(Orden::class);
    }

    public function ubicacion(){
        return $this->hasOne(Ubicacion::class);
    }
}
