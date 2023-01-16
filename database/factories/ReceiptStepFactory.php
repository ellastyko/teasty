<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receipt>
 */
class ReceiptStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'   => fake()->title,
            'content' => fake()->realText(400),
            'image'   => resource_path('images/seeds/receipt-steps/' . rand(1, 10) . '.png'),
        ];
    }
}
