<?php

declare(strict_types=1);

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

test('to array', function () {
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

it('can create a new setting', function () {
    $key = 'test_key';
    $value = 'test_value';

    Setting::setValue($key, $value);

    $setting = Setting::where('key', $key)->first();
    expect($setting)->not->toBeNull()
        ->and($setting->value)->toBe($value)
        ->and($setting->type)->toBe('string');
});

it('can update an existing setting', function () {
    $key = 'test_key';
    Setting::create(['key' => $key, 'value' => 'old_value', 'type' => 'string']);

    Setting::setValue($key, 'new_value');

    $setting = Setting::where('key', $key)->first();
    expect($setting->value)->toBe('new_value');
});

it('clears cache when setting is updated', function () {
    $key = 'test_key';
    Cache::shouldReceive('forget')
        ->once()
        ->with('setting:' . $key)
        ->andReturn(true);

    Setting::setValue($key, 'test_value');

    Cache::shouldHaveReceived('forget')->once();
});

it('can store different types of settings', function () {
    Setting::setValue('string_key', 'value', 'string');
    Setting::setValue('int_key', 42, 'integer');
    Setting::setValue('bool_key', true, 'boolean');

    expect(Setting::where('key', 'string_key')->first()->type)->toBe('string')
        ->and(Setting::where('key', 'int_key')->first()->type)->toBe('integer')
        ->and(Setting::where('key', 'bool_key')->first()->type)->toBe('boolean');
});

it('gets string value', function () {
    Setting::factory()->create([
        'key' => 'test_key',
        'value' => 'test_value',
        'type' => 'string',
    ]);

    expect(Setting::getValue('test_key'))->toBe('test_value');
});

it('gets integer value', function () {
    Setting::factory()->create([
        'key' => 'test_int',
        'value' => '123',
        'type' => 'integer',
    ]);

    expect(Setting::getValue('test_int'))->toBe(123);
});

it('gets boolean value', function () {
    Setting::factory()->create([
        'key' => 'test_bool',
        'value' => '1',
        'type' => 'boolean',
    ]);

    expect(Setting::getValue('test_bool'))->toBeTrue();
});

it('gets json value', function () {
    Setting::factory()->create([
        'key' => 'test_json',
        'value' => '{"key":"value"}',
        'type' => 'json',
    ]);

    expect(Setting::getValue('test_json'))->toBe(['key' => 'value']);
});

it('returns default value when setting not found', function () {
    expect(Setting::getValue('nonexistent', 'default'))->toBe('default');
});
