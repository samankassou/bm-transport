<?php

declare(strict_types=1);

use App\Models\User;

test('to array', function () {
    $user = User::factory()->create()->fresh();

    expect(array_keys($user->toArray()))
        ->toEqual([
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ]);
});

it('may have companies', function () {
    $user = User::factory()->hasCompanies(3)->create();

    expect($user->companies)->toHaveCount(3);
});
