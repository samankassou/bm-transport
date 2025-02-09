<?php

declare(strict_types=1);

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('{company}')->group(function () {
    Route::resource('incomes', IncomeController::class)->except(['create', 'edit']);
    Route::resource('expenses', ExpenseController::class)->except(['create', 'edit']);
});
