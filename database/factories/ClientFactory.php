<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'nombre' => fake()->name(), 
            'email'=> fake()->unique()->safeEmail(),          
            'direccion'=>fake()->address(),
            'telefono'=>fake()->phoneNumber()          
        ];
    }
}
