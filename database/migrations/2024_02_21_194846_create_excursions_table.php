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
        Schema::create('excursions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->time('hora_salida');
            $table->date('fecha_fin');
            $table->time('hora_regreso');
            $table->decimal('precio_entrada',8,2);
            $table->decimal('precio_final',8,2);
            $table->integer('capacidad_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excursions');
    }
};
