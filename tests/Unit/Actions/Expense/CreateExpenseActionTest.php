<?php

declare(strict_types=1);

use App\Actions\Expense\CreateExpenseAction;
use App\Models\Company;
use App\Models\TypeOfExpense;

it('can create an expense', function () {
    $action = app(CreateExpenseAction::class);
    $company = Company::factory()->create();
    $typeOfExpense = TypeOfExpense::factory()->create();

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
