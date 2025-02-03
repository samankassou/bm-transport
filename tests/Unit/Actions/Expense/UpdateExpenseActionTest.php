<?php

declare(strict_types=1);

use App\Actions\Expense\UpdateExpenseAction;
use App\Models\Expense;

it('can update an expense', function () {
    $this->freezeTime();
    $expense = Expense::factory()->create();
    $typeOfExpense = Expense::factory()->create();
    $action = app(UpdateExpenseAction::class);

    $action->handle($expense, [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);

    $this->assertDatabaseHas('expenses', [
        'id' => $expense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);

    expect($expense->typeOfExpense->id)->toEqual($typeOfExpense->id);
});
