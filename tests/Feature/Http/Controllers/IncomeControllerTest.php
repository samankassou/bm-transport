<?php

declare(strict_types=1);

use App\Models\Income;
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

it('can update an income', function () {
    $typeOfIncome = TypeOfIncome::factory()->create();
    $income = Income::factory()->create();

    $response = $this->putJson(route('incomes.update', $income), [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);

    $response->assertStatus(204);

    $this->assertDatabaseHas('incomes', [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);
});

it('can delete an income', function () {
    $income = Income::factory()->create();

    $response = $this->deleteJson(route('incomes.destroy', $income));

    $response->assertStatus(204);

    expect($income->exists())->toBeFalse();
});
