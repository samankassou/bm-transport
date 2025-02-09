<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\Supplier;
use App\Models\SupplierType;

test('to array', function () {
    $supplierType = SupplierType::factory()->create()->fresh();

    expect(array_keys($supplierType->toArray()))
        ->toEqual([
            'id',
            'company_id',
            'name',
            'created_at',
            'updated_at',
        ]);
});

it('belongs to a company', function () {
    $supplierType = SupplierType::factory()->create();

    expect($supplierType->company)->toBeInstanceOf(Company::class);
});

it('may have a supplier', function () {
    $supplierType = SupplierType::factory()->hasSuppliers(3)->create();

    expect($supplierType->suppliers)->toHaveCount(3)
        ->each->toBeInstanceOf(Supplier::class);
});
