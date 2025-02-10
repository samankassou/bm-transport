<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Income;
use App\Models\TypeOfExpense;
use App\Models\TypeOfIncome;
use App\Models\User;

test('to array', function () {
    $company = Company::factory()->create()->fresh();

    expect(array_keys($company->toArray()))
        ->toEqual([
            'id',
            'name',
            'short_name',
            'domain',
            'address',
            'phone',
            'email',
            'website',
            'owner_id',
            'created_at',
            'updated_at',
        ]);
});

it('it has an owner', function () {
    $company = Company::factory()->create()->fresh();

    expect($company->owner)->toBeInstanceOf(User::class);
});

it('may have users', function () {
    $company = Company::factory()->hasUsers(3)->create();

    expect($company->users)->toHaveCount(3)
        ->each->toBeInstanceOf(User::class);
});

it('may have customers', function () {
    $company = Company::factory()->hasCustomers(3)->create();

    expect($company->customers)->toHaveCount(3)
        ->each->toBeInstanceOf(Customer::class);
});

it('may have type of incomes', function () {
    $company = Company::factory()->hasTypeOfIncomes(3)->create();

    expect($company->typeOfIncomes)->toHaveCount(3)
        ->each->toBeInstanceOf(TypeOfIncome::class);
});

it('may have incomes', function () {
    $company = Company::factory()->hasIncomes(3)->create();

    expect($company->incomes)->toHaveCount(3)
        ->each->toBeInstanceOf(Income::class);
});

it('may have type of expenses', function () {
    $company = Company::factory()->hasTypeOfExpenses(3)->create();

    expect($company->typeOfExpenses)->toHaveCount(3)
        ->each->toBeInstanceOf(TypeOfExpense::class);
});

it('may have expenses', function () {
    $company = Company::factory()->hasExpenses(3)->create();

    expect($company->expenses)->toHaveCount(3)
        ->each->toBeInstanceOf(Expense::class);
});
