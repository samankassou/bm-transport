<?php

declare(strict_types=1);

use App\Models\Income;

test('to array', function () {
    $income = Income::factory()->create()->fresh();

    expect(array_keys($income->toArray()))
        ->toEqual([
            'id',
            'type_of_income_id',
            'title',
            'date',
            'amount',
            'created_at',
            'updated_at',
        ]);
});

it('has type of income', function () {
    $income = Income::factory()->create();

    expect($income->typeOfIncome)->toBeInstanceOf(App\Models\TypeOfIncome::class);
});
