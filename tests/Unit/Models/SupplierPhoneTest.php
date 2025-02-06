<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\Supplier;
use App\Models\SupplierPhone;

test('to array', function () {
    $supplierPhone = SupplierPhone::factory()->create()->fresh();

    expect(array_keys($supplierPhone->toArray()))
        ->toEqual([
            'id',
            'company_id',
            'supplier_id',
            'phone',
            'created_at',
            'updated_at',
        ]);
});

it('belongs to a company', function () {
    $supplierPhone = SupplierPhone::factory()->create()->fresh();

    expect($supplierPhone->company)->toBeInstanceOf(Company::class);
});

it('belongs to a supplier', function () {
    $supplierPhone = SupplierPhone::factory()->create()->fresh();

    expect($supplierPhone->supplier)->toBeInstanceOf(Supplier::class);
});
