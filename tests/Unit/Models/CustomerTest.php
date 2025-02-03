<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\Customer;

test('to array', function () {
    $customer = Customer::factory()->create()->fresh();

    expect(array_keys($customer->toArray()))
        ->toEqual([
            'id',
            'company_id',
            'name',
            'email',
            'rccm_number',
            'postal_code',
            'address',
            'created_at',
            'updated_at',
        ]);
});

it('belongs to a company', function () {
    $customer = Customer::factory()->create()->fresh();

    expect($customer->company)->toBeInstanceOf(Company::class);
});

it('may have phones', function () {
    $customer = Customer::factory()->hasPhones(3)->create();

    expect($customer->phones)->toHaveCount(3);
});
