<?php

declare(strict_types=1);

use App\Models\Expense;
use App\Models\TypeOfExpense;

it('can create an expense', function () {
    $typeOfExpense = TypeOfExpense::factory()->create();

    $response = $this->postJson(route('expenses.store'), [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('expenses', [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);
});

test('the amount of the expense should be numeric', function () {
    $typeOfExpense = TypeOfExpense::factory()->create();

    $response = $this->postJson(route('expenses.store'), [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 'abc',
    ]);

    $response->assertStatus(422);
});

it('can update an expense', function () {
    $expense = Expense::factory()->create();
    $typeOfExpense = TypeOfExpense::factory()->create();

    $response = $this->putJson(route('expenses.update', $expense), [
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
    $expense = Expense::factory()->create();

    $response = $this->deleteJson(route('expenses.destroy', $expense));

    $response->assertStatus(204);

    $this->assertDatabaseMissing('expenses', [
        'id' => $expense->id,
    ]);
});
