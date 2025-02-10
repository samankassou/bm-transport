<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\User;

test('to array', function () {
    $user = User::factory()->create()->fresh();

    expect(array_keys($user->toArray()))
        ->toEqual([
            'id',
            'company_id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ]);
});

it('may belong to a company', function () {
    $user = User::factory()->create()->fresh();

    expect($user->company)->toBeInstanceOf(Company::class);
})->skip('This test is skipped because there is an issue when adding comapny the to user Factory.');
