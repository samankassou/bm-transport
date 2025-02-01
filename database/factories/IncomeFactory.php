<?php

namespace Database\Factories;

use App\Models\TypeOfIncome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_of_income_id' => TypeOfIncome::factory()->create(),
            'title' => $this->faker->sentence,
            'date' => $this->faker->date,
            'amount' => $this->faker->randomNumber(7),
        ];
    }
}
