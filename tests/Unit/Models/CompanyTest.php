<?php

declare(strict_types=1);

use App\Models\Company;
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

it('may have customers', function () {
    $company = Company::factory()->hasCustomers(3)->create();

    expect($company->customers->count())->toBe(3);
});

it('may have type of incomes', function () {
    $company = Company::factory()->hasTypeOfIncomes(3)->create();

    expect($company->typeOfIncomes->count())->toBe(3);
});

it('may have incomes', function () {
    $company = Company::factory()->hasIncomes(3)->create();

    expect($company->incomes->count())->toBe(3);
});

it('may have type of expenses', function () {
    $company = Company::factory()->hasTypeOfExpenses(3)->create();

    expect($company->typeOfExpenses->count())->toBe(3);
});

it('may have expenses', function () {
    $company = Company::factory()->hasExpenses(3)->create();

    expect($company->expenses->count())->toBe(3);
});
