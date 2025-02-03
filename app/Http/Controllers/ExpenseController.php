<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Expense\CreateExpenseAction;
use App\Http\Requests\CreateExpenseRequest;
use Illuminate\Http\Response;

final class ExpenseController
{
    public function store(CreateExpenseRequest $request, CreateExpenseAction $action): Response
    {
        $action->handle($request->array());

        return response(status: 201);
    }
}
