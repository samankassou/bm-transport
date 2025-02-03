<?php

declare(strict_types=1);

use App\Actions\Income\CreateIncomeAction;
use App\Models\TypeOfIncome;

it('creates new income', function () {
    $action = app(CreateIncomeAction::class);
    $typeOfIncome = TypeOfIncome::factory()->create();

    $action->handle([
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);

    $this->assertDatabaseHas('incomes', [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);
});
