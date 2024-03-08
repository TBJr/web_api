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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            // $table->morphs('imageable');
            $table->string('url',255);
            $table->timestamps();
        });

        Schema::create('imageables', function (Blueprint $table) {

            $table->foreignId('image_id')->constrained();  
            $table->morphs('imageable') ;    
            // $table->integer("imageable_id");        
            // $table->string("imageable_type");
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imageables');
        Schema::dropIfExists('images');
        
    }
};
