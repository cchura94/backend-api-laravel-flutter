<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orden(){
        return $this->hasOne(Orden::class);
    }
}
