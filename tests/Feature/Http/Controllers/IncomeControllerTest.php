<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\Income;
use App\Models\TypeOfIncome;

it('can create an income', function () {
    $company = Company::factory()->create();
    $typeOfIncome = TypeOfIncome::factory()->create();

    $response = $this->postJson(route('incomes.store', ['company' => $company]), [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('incomes', [
        'company_id' => $company->id,
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);
});

it('can update an income', function () {
    $company = Company::factory()
        ->hasTypeOfIncomes(1)
        ->hasIncomes(1)
        ->create();
    $typeOfIncome = $company->typeOfIncomes->first();
    $income = $company->incomes->first();

    $response = $this->putJson(route('incomes.update', ['company' => $company, 'income' => $income]), [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);

    $response->assertStatus(204);

    $this->assertDatabaseHas('incomes', [
        'company_id' => $company->id,
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);
});

it('can delete an income', function () {
    $company = Company::factory()->create();
    $income = Income::factory()->create();

    $response = $this->deleteJson(route('incomes.destroy', ['company' => $company, 'income' => $income]));

    $response->assertStatus(204);

    expect($income->exists())->toBeFalse();
});
