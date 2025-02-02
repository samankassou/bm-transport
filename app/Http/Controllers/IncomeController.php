<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateIncomeAction;
use App\Http\Requests\CreateIncomeRequest;
use Illuminate\Http\Response;

final class IncomeController extends Controller
{
    public function store(CreateIncomeRequest $request, CreateIncomeAction $createIncome): Response
    {
        $createIncome->handle($request->array());

        return response(status: 201);
    }
}
