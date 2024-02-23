<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

       $reservations = Reservation::factory(30)->create();

       $reservations->each(function($reservation){
            Payment::factory()->for($reservation)->create();
       });
    }
}
