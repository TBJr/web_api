<?php

namespace Database\Seeders;

use App\Models\Excursion;
use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExcursionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Excursion::factory(6)->has(Place::factory(4))->create();

    }
}
