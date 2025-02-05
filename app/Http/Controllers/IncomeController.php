<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Income\CreateIncomeAction;
use App\Actions\Income\DeleteIncomeAction;
use App\Actions\Income\UpdateIncomeAction;
use App\Http\Requests\CreateIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use Illuminate\Http\Response;

final class IncomeController
{
    public function store(CreateIncomeRequest $request, CreateIncomeAction $action): Response
    {
        $action->handle($request->array());

        return response(status: 201);
    }

    public function update(UpdateIncomeRequest $request, Income $income, UpdateIncomeAction $action): Response
    {
        $action->handle($income, $request->array());

        return response(status: 204);
    }

    public function destroy(Income $income, DeleteIncomeAction $action): Response
    {
        $action->handle($income);

        return response(status: 204);
    }
}
