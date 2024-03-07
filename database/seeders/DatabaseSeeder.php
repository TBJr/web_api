<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         \App\Models\User::factory(18)->create();


        Storage::deleteDirectory('/public/images');
        Storage::makeDirectory('/public/images');
        $this->call([
            ClientSeeder::class,
            ExcursionSeeder::class,
            ReservationSeeder::class,
            OpinionSeeder::class


        ]);
    }
}
