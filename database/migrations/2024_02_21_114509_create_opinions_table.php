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
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('puntuacion');
            $table->text('comentario');
            $table->dateTime('fecha_opinion',$precision=0);
            $table->foreignId('reservations_id')->constrained('reservations')->onDelete('cascade');
            $table->foreignId('excursions_id')->constrained('excursions')->onDeleteonDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opinions');
    }
};
