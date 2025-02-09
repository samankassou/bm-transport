<?php

declare(strict_types=1);

use App\Actions\Income\CreateIncomeAction;
use App\Models\Company;
use App\Models\TypeOfIncome;

it('creates new income', function () {
    $action = app(CreateIncomeAction::class);
    $company = Company::factory()->create();
    $typeOfIncome = TypeOfIncome::factory()->create();

    $action->handle($company, [
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);

    $this->assertDatabaseHas('incomes', [
        'company_id' => $company->id,
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);
});
