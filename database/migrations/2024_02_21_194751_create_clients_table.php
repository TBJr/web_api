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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
            $table->string('email')->unique();
            $table->string('direccion',200);
            $table->string('telefono',20);
<<<<<<< HEAD
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
=======
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
>>>>>>> origin/branch-yaneisy
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
