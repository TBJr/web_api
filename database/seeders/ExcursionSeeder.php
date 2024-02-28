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
       //Image::factory(6)->create();

       foreach( Excursion::all() as $excursion ){

            $places = Place::inRandomorder()->take(rand(1,5))->pluck('id');

            $excursion->places()->attach($places);


       }

       $excursion=Excursion::factory(6)->create();

       foreach( $excursion as $excursion ){

            Image::factory(1)->create([
               'imageable_id'=>$excursion->id,
               'imageable_type'=>Excursion::class
            ]);


       }


    }
}
