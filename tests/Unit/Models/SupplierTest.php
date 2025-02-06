<?php

declare(strict_types=1);

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Supplier;
use App\Models\SupplierType;

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

it('has a type', function () {
    $supplier = Supplier::factory()->create()->fresh();

    expect($supplier->supplierType)->toBeInstanceOf(SupplierType::class);
});

it('may have phones', function () {
    $supplier = Supplier::factory()->hasPhones(3)->create();

    expect($supplier->phones)->toHaveCount(3);
});

it('belongs to a city', function () {
    $supplier = Supplier::factory()->create()->fresh();

    expect($supplier->city)->toBeInstanceOf(City::class);
});

it('belongs to a country', function () {
    $supplier = Supplier::factory()->create();

    expect($supplier->country)->toBeInstanceOf(Country::class);
});
