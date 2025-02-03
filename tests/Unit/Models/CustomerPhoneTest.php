<?php

declare(strict_types=1);

use App\Models\Customer;
use App\Models\CustomerPhone;

test('to array', function () {
    $customerPhone = CustomerPhone::factory()->create()->fresh();

    expect(array_keys($customerPhone->toArray()))
        ->toEqual([
            'id',
            'customer_id',
            'phone',
            'created_at',
            'updated_at',
        ]);
});

it('belongs to a customer', function () {
    $customerPhone = CustomerPhone::factory()->create()->fresh();

    expect($customerPhone->customer)->toBeInstanceOf(Customer::class);
});
