<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Actions\CreateIncomeAction;
use App\Actions\UpdateIncomeAction;
use App\Http\Requests\CreateIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;

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
}
