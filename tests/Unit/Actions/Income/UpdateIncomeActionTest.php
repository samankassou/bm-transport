<?php

declare(strict_types=1);

use App\Actions\Income\UpdateIncomeAction;
use App\Models\Income;

it('can update an income', function () {
    $this->freezeTime();
    $income = Income::factory()->create()->fresh();
    $typeOfIncome = Income::factory()->create();
    $action = app(UpdateIncomeAction::class);

    $attributes = [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary updated',
        'date' => now(),
        'amount' => 2000,
    ];

    $action->handle($income, $attributes);

    $income->refresh();

    expect($income->toArray())->toMatchArray([
        'title' => 'Salary updated',
        'date' => now(),
        'amount' => 2000,
    ]);
});

it('updates only the provided fields', function () {
    $income = Income::factory()->create(['title' => 'Original Title', 'amount' => 1000]);
    $action = app(UpdateIncomeAction::class);

    $attributes = [
        'title' => 'Updated Title',
    ];

    $action->handle($income, $attributes);

    $income->refresh();

    expect($income->title)->toBe('Updated Title')
        ->and($income->amount)->toBe(1000);
});
