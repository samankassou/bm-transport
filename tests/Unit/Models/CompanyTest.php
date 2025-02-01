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
