<?php

declare(strict_types=1);

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('incomes', IncomeController::class)->only(['store', 'update', 'destroy']);
Route::resource('expenses', ExpenseController::class)->only(['store']);
