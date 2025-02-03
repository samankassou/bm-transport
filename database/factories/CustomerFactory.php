<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
final class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory()->create(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'rccm_number' => $this->faker->ean13,
            'postal_code' => $this->faker->postcode,
            'address' => $this->faker->address,
        ];
    }
}
