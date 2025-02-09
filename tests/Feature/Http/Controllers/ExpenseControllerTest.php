<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\TypeOfExpense;

it('can create an expense', function () {
    $company = Company::factory()->create();
    $typeOfExpense = TypeOfExpense::factory()->create();

    $response = $this->postJson(route('expenses.store', ['company' => $company]), [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('expenses', [
        'company_id' => $company->id,
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);
});

test('the amount of the expense should be numeric', function () {
    $company = Company::factory()->create();
    $typeOfExpense = TypeOfExpense::factory()->create();

    $response = $this->postJson(route('expenses.store', ['company' => $company]), [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 'abc',
    ]);

    $response->assertStatus(422);
});

it('can update an expense', function () {
    $company = Company::factory()
        ->hasTypeOfExpenses(1)
        ->hasExpenses(1)
        ->create();
    $expense = $company->expenses->first();
    $typeOfExpense = $company->typeOfExpenses->first();

    $response = $this->putJson(route('expenses.update', ['company' => $company, 'expense' => $expense]), [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);

    $response->assertStatus(204);

    $this->assertDatabaseHas('expenses', [
        'id' => $expense->id,
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);
});

it('can delete an expense', function () {
    $company = Company::factory()
        ->hasExpenses(1)
        ->create();
    $expense = $company->expenses->first();

    $response = $this->deleteJson(route('expenses.destroy', ['company' => $company, 'expense' => $expense]));

    $response->assertStatus(204);

    $this->assertDatabaseMissing('expenses', [
        'id' => $expense->id,
    ]);
});
