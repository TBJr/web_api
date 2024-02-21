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
            $table->string('name');
            $table->text('descripcion');
            $table->dateTime('fecha_hora_inicio',$precision=0);
            $table->dateTime('fecha_hora_fin',$precision=0);
            $table->decimal('precio', 10, 2);
            $table->bigInteger('capacidad_maxima');
            $table->bigInteger('lugares_disponibles');
            $table->enum('dificultad',['baja','media','alta']);
            $table->dateTime('duracion',$precision=0);
            $table->enum('transporte',['incluido','noincluido']);
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
