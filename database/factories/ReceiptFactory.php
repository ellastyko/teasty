<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receipt>
 */
class ReceiptFactory extends Factory
{
    protected array $dishes = [
        'burger',
        'pasta',
        'pie',
        'pizza',
        'spaghetti',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dish = $this->dishes[rand(0, 4)];

        return [
            'title'       => "How to cook $dish",
            'description' => fake()->realText(400),
            'cook_time'   => rand(1, 180),
            'image'       => resource_path("images/seeds/receipts/$dish.png"),
            'author'      => User::inRandomOrder()->first()->id,
        ];
    }
}
