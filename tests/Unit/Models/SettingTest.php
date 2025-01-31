<?php

declare(strict_types=1);

use App\Models\Setting;

it('to array', function () {
    $city = Setting::factory()->create()->fresh();

    expect(array_keys($city->toArray()))
        ->toEqual([
            'id',
            'key',
            'type',
            'value',
            'created_at',
            'updated_at',
        ]);
});
