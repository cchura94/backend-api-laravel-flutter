<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    public function ruta(){
        return $this->belongsTo(Ruta::class);
    }
    public function seguimiento(){
        return $this->belongsTo(Seguimiento::class);
    }
    
}
