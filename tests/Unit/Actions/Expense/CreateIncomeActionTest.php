<?php

declare(strict_types=1);

use App\Actions\CreateExpenseAction;
use App\Models\TypeOfExpense;

it('can create an expense', function () {
    $typeOfExpense = TypeOfExpense::factory()->create();
    $action = app(CreateExpenseAction::class);

    $action->handle([
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);

    $this->assertDatabaseHas('expenses', [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);
});
