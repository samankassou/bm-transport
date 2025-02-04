<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\SupplierType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'supplier_type_id' => SupplierType::factory()->create(),
            'country_id' => Country::factory()->create(),
            'city_id' => City::factory()->create(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'rccm_number' => $this->faker->ean13,
            'postal_code' => $this->faker->postcode,
            'address' => $this->faker->address,
            'notes' => $this->faker->sentence,
        ];
    }
}
