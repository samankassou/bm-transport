<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\SupplierType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
final class SupplierFactory extends Factory
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
            'supplier_type_id' => SupplierType::factory(),
            'country_id' => Country::factory(),
            'city_id' => City::factory(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'website' => fake()->url(),
            'rccm_number' => fake()->ean13(),
            'postal_code' => fake()->postcode(),
            'address' => fake()->address(),
            'notes' => fake()->sentence(),
        ];
    }
}
