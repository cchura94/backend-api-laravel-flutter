<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("orden_id")->unsigned();
            $table->bigInteger("conductor_id")->unsigned();
            $table->bigInteger("ubicacion_id")->unsigned();

            $table->foreign("orden_id")->references("id")->on("ordens");
            $table->foreign("conductor_id")->references("id")->on("conductors");
            $table->foreign("ubicacion_id")->references("id")->on("ubicacions");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutas');
    }
};
