<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
final class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $value = fake()->randomElement([true, false, null, 1, 0, 'test', json_encode(['test' => 'test'])]);
        $type = gettype($value);

        return [
            'key' => fake()->word(),
            'type' => $type,
            'value' => $value,
        ];
    }
}
