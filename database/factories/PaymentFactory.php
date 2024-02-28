<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $reservation = Reservation::doesntHave('payment')->get()->random();
        return [
            //
            'monto'=>fake()->randomFloat(2,0,12000),
            'fecha_pago'=>fake()->dateTimeThisDecade(),
            'metodo_pago'=> fake()->randomElement(['efectivo','electronico']),
            // 'reservation_id'=>$reservation->id
        ];
    }
}
