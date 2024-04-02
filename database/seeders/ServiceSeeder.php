<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Obtén todos los servicios y excursiones
    $services = App\Models\Service::all();
    $excursions = App\Models\Excursion::all();

    // Para cada excursión, adjunta servicios aleatorios
    foreach ($excursions as $excursion) {
        $excursion->services()->attach(
            $services->random(rand(1, 3))->pluck('id')->toArray()
        );
    }
    }
}
