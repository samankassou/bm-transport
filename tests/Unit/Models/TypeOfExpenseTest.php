<?php

declare(strict_types=1);

use App\Models\TypeOfExpense;

test('to array', function () {
    $typeOfExpense = TypeOfExpense::factory()->create()->fresh();

    expect($typeOfExpense->toArray())->toHaveKeys([
        'id',
        'company_id',
        'title',
        'created_at',
        'updated_at',
    ]);
});

it('may have expenses', function () {
    $typeOfExpense = TypeOfExpense::factory()->hasExpenses(3)->create();

    expect($typeOfExpense->expenses)->toHaveCount(3);
});
