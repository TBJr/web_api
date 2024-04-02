<?php

namespace Database\Seeders;

use App\Models\Excursion;
use App\Models\Place;
use App\Models\Image;
use App\Models\Service;
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
        Excursion::factory(30)->create();
        Place::factory(20)->create();
        Image::factory(20)->create();
        Service::factory(10)->create();

        foreach( Excursion::all() as $excursion ){

            $places = Place::inRandomorder()->take(rand(1,5))->pluck('id');

            $images  = Image::inRandomorder()->take(rand(1,2))->pluck('id');

            $excursion->places()->attach($places);
            $excursion->images()->attach($images);

        }

        foreach( Place::all() as $place ){

            $images  = Image::inRandomorder()->take(rand(1,3))->pluck('id');
            $place->images()->attach($images);

        }

        foreach (Excursion::all() as $excursion) {
            $excursion->services()->attach(
                Service::all()->random(rand(1, 3))->pluck('id')->toArray()
            );
        }



    }
}
