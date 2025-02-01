<?php

declare(strict_types=1);

use App\Models\TypeOfIncome;

test('to array', function () {
    $typeOfIncome = TypeOfIncome::factory()->create()->fresh();

    expect(array_keys($typeOfIncome->toArray()))
        ->toEqual([
            'id',
            'name',
            'created_at',
            'updated_at',
        ]);
});

it('may have incomes', function () {
    $typeOfIncome = TypeOfIncome::factory()->hasIncomes(3)->create();

    expect($typeOfIncome->incomes)->toHaveCount(3);
});
