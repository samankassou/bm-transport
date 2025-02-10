<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Expense\CreateExpenseAction;
use App\Actions\Expense\DeleteExpenseAction;
use App\Actions\Expense\UpdateExpenseAction;
use App\Http\Requests\CreateExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

final class ExpenseController
{
    public function index(): Response
    {
        $expenses = Auth::user()->company->expenses()->with('typeOfExpense')->paginate(5);

        return Inertia::render('Expenses/Index', [
            'expenses' => $expenses,
        ]);
    }

    public function store(CreateExpenseRequest $request, CreateExpenseAction $action): RedirectResponse
    {
        $action->handle(Auth::user()->company, $request->validated());

        return Redirect::route('expenses.index')->with('success', 'Expense created.');
    }

    public function update(CreateExpenseRequest $request, Expense $expense, UpdateExpenseAction $action): RedirectResponse
    {
        $action->handle($expense, $request->validated());

        return Redirect::route('expenses.index')->with('success', 'Expense updated.');
    }

    public function destroy(Expense $expense, DeleteExpenseAction $action): RedirectResponse
    {
        $action->handle($expense);

        return Redirect::route('expenses.index')->with('success', 'Expense deleted.');
    }
}
