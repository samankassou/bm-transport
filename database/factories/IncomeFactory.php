<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use App\Models\TypeOfIncome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
final class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'type_of_income_id' => TypeOfIncome::factory(),
            'title' => fake()->sentence(),
            'date' => fake()->date(),
            'amount' => fake()->randomNumber(7),
        ];
    }
}
