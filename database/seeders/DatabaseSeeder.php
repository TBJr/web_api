<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('/public/images');
        Storage::makeDirectory('/public/images');
         \App\Models\User::factory(18)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call([
            ClientSeeder::class,
            ExcursionSeeder::class,
            ReservationSeeder::class,
            OpinionSeeder::class


        ]);
    }
}
