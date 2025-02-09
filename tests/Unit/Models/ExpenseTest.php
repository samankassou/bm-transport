<?php

declare(strict_types=1);

use App\Models\Expense;
use App\Models\TypeOfExpense;

test('to array', function () {
    $expense = Expense::factory()->create()->fresh();

    expect(array_keys($expense->toArray()))
        ->toEqual([
            'id',
            'company_id',
            'type_of_expense_id',
            'title',
            'date',
            'amount',
            'comments',
            'created_at',
            'updated_at',
        ]);
});

it('has a type', function () {
    $expense = Expense::factory()->create()->fresh();

    expect($expense->typeOfExpense)->toBeInstanceOf(TypeOfExpense::class);
});
