<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Excursion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {  
        $client = Client::all()->random();
        $excursion=Excursion::all()->random();
        return [
            'client_id'=> $client->id,
            'fecha_reserva'=>fake()->dateTimeThisDecade(),
            'cantidad_personas'=>fake()->random_int(1,50),
            'estado'=>fake()->randomElement(['confirmada','pendiente','cancelada']),
            'excursion_id'=> $excursion->id
           
        ];
    }
}
