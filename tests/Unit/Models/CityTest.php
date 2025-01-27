<?php

declare(strict_types=1);

use App\Models\City;

it('to array', function () {
    $city = City::factory()->create()->fresh();

    expect(array_keys($city->toArray()))
        ->toEqual([
            'id',
            'country_id',
            'name',
            'created_at',
            'updated_at',
        ]);
});
