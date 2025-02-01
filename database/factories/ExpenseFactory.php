<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TypeOfExpense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
final class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_of_expense_id' => TypeOfExpense::factory()->create(),
            'title' => $this->faker->sentence,
            'date' => $this->faker->date,
            'amount' => $this->faker->randomNumber(6),
            'comments' => $this->faker->paragraph(2),
        ];
    }
}
