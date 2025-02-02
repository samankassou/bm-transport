<?php

declare(strict_types=1);

use App\Models\TypeOfIncome;

it('can create an income', function () {
    $typeOfIncome = TypeOfIncome::factory()->create();

    $response = $this->postJson(route('incomes.store'), [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('incomes', [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);
});
