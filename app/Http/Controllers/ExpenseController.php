<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Expense\CreateExpenseAction;
use App\Actions\Expense\UpdateExpenseAction;
use App\Http\Requests\CreateExpenseRequest;
use App\Models\Company;
use App\Models\Expense;
use Illuminate\Http\Response;

final class ExpenseController
{
    public function store(CreateExpenseRequest $request, Company $company, CreateExpenseAction $action): Response
    {
        $action->handle($company, $request->validated());

        return response(status: 201);
    }

    public function update(CreateExpenseRequest $request, Company $company, Expense $expense, UpdateExpenseAction $action): Response
    {
        $action->handle($expense, $request->array());

        return response(status: 204);
    }

    public function destroy(Company $company, Expense $expense): Response
    {
        $expense->delete();

        return response(status: 204);
    }
}
