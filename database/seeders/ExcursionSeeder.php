<?php

namespace Database\Seeders;

use App\Models\Excursion;
use App\Models\Place;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ExcursionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       Excursion::factory(6)->create();
       Place::factory(20)->create();
       Image::factory(6)->create();

       foreach( Excursion::all() as $excursion ){

            $places = Place::inRandomorder()->take(rand(1,5))->pluck('id');

            $excursion->places()->attach($places);

            
       }
    
       $post=Excursion::factory(300)->create();
      
       foreach( $post as $post ){

            Image::factor(1)->create([
               'imageable_id'=>$post->id,
               'imageable_type'=>Excursion::class
            ]);
            $post->tags()->attach([ 
            rand(1, 4),
            rand(5, 8),
            ]);
        
       }


    }
}
