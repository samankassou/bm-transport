<?php

declare(strict_types=1);

use App\Actions\Expense\CreateExpenseAction;
use App\Models\Company;

it('can create an expense', function () {
    $action = app(CreateExpenseAction::class);
    $company = Company::factory()
        ->hasTypeOfExpenses(1)
        ->create();
    $typeOfExpense = $company->typeOfExpenses->first();

    $action->handle($company, [
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);

    $this->assertDatabaseHas('expenses', [
        'company_id' => $company->id,
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);
});
