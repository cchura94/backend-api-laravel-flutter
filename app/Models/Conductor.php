<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    public function rutas(){
        return $this->hasMany(Ruta::class);
    }
}
