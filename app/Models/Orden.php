<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    public function paquete(){
        return $this->belongsTo(Paquete::class);
    }

    public function ruta(){
        return $this->hasOne(Ruta::class);
    }

    public function seguimientos(){
        return $this->hasMany(Seguimiento::class);
    }
}
