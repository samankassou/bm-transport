<?php

use App\Models\Company;
use App\Models\Supplier;

test('to array', function () {
    $supplier = Supplier::factory()->create()->fresh();

    expect(array_keys($supplier->toArray()))
        ->toEqual([
            'id',
            'company_id',
            'supplier_type_id',
            'country_id',
            'city_id',
            'name',
            'email',
            'website',
            'rccm_number',
            'postal_code',
            'address',
            'notes',
            'created_at',
            'updated_at',
        ]);
});

it('belongs to a company', function () {
    $supplier = Supplier::factory()->create()->fresh();

    expect($supplier->company)->toBeInstanceOf(Company::class);
});
