<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Excursion>
 */
class ExcursionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $precio_final = fake()->randomFloat(2,0,50000);

        return [
            'nombre'=>fake()->name(),
            'descripcion'=>fake()->sentences(),
            'fecha_inicio'=>fake()->dateTimeThisDecade(),
            'fecha_fin'=>fake()->dateTimeThisDecade(),
            'precio_entrada'=>fake()->randomFloat(2,0,$precio_final),
            'precio_final'=>$precio_final,
            'capacidad_max'=>fake()->random_int(8,1000),
            'destino'
        ];
    }
}
