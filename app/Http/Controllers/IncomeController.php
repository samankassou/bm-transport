<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Income\CreateIncomeAction;
use App\Actions\Income\DeleteIncomeAction;
use App\Actions\Income\UpdateIncomeAction;
use App\Http\Requests\CreateIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

final class IncomeController
{
    public function index(): Response
    {
        $incomes = $this->getAuthenticatedUser()->company->incomes()->with('typeOfIncome')->paginate(5);

        return Inertia::render('Incomes/Index', [
            'incomes' => $incomes,
        ]);
    }

    public function store(CreateIncomeRequest $request, CreateIncomeAction $action): RedirectResponse
    {
        $action->handle($this->getAuthenticatedUser()->company, $request->validated());

        return Redirect::route('incomes.index')->with('success', 'Income created.');
    }

    public function update(UpdateIncomeRequest $request, Income $income, UpdateIncomeAction $action): RedirectResponse
    {
        $action->handle($income, $request->validated());

        return Redirect::route('incomes.index')->with('success', 'Income updated.');
    }

    public function destroy(Income $income, DeleteIncomeAction $action): RedirectResponse
    {
        $action->handle($income);

        return Redirect::route('incomes.index')->with('success', 'Income deleted.');
    }

    /**
     * @psalm-return User
     *
     * @phpstan-return User
     */
    private function getAuthenticatedUser(): User
    {
        /** @var User */
        return Auth::user();
    }
}
