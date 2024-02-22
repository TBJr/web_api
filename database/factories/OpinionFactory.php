<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Excursion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opinion>
 */
class OpinionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $excursion = Excursion::all()->random();
        $client= Client::all()->random();
        return [
            //
            'puntuacion'=>fake()->random_int(1,5),
            'comentario'=>fake()->sentences(),
            'fecha'=>fake()->dateTimeThisDecade(),
            'excursion_id'=>$excursion->id,
            'client_id'=>$client->id

        ];
    }
}
