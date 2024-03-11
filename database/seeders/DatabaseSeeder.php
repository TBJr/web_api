<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======

>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD

         \App\Models\User::factory(18)->create();


        Storage::deleteDirectory('/public/images');
        Storage::makeDirectory('/public/images');
=======
        Storage::deleteDirectory('/public/images');
        Storage::makeDirectory('/public/images');
         \App\Models\User::factory(18)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a
        $this->call([
            ClientSeeder::class,
            ExcursionSeeder::class,
            ReservationSeeder::class,
            OpinionSeeder::class


        ]);
    }
}
