<?php

namespace Database\Seeders;

use App\Models\Excursion;
use App\Models\Place;
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

       foreach( Excursion::all() as $excursion ){

            $places = Place::inRandomorder()->take(rand(1,5))->pluck('id');

            $excursion->places()->attach($places);

       }
      

    }
}
