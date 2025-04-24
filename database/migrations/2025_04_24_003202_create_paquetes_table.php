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
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->string("tamano");
            $table->decimal("peso", 5, 2);
            $table->boolean("entrega_express")->default(false);
            $table->boolean("proteccion_danos")->default(false);
            $table->boolean("cargo_por_retraso")->default(false);
            $table->string("estado", 50)->default("solicitado");
            $table->timestamp("entrega_estimada")->nullable();
            $table->timestamp("entregado_en")->nullable();

            // N:1
            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};
