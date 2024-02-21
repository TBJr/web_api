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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_reserva',$precision=0);
            $table->bigInteger('cantidad_personas');
            $table->enum('estado_reserva',['pendiente','confirmada','cancelada']);
            $table->foreignId('customers_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('excursions_id')->constrained('excursions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
