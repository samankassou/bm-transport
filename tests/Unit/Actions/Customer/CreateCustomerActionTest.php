<?php

declare(strict_types=1);

use App\Actions\Customer\CreateCustomerAction;
use App\Models\Company;

it('can create a customer', function () {
    $action = app(CreateCustomerAction::class);
    $company = Company::factory()->create();

    $action->handle($company, [
        'name' => 'John Doe',
        'email' => 'john.doe@company.com',
        'rccm_number' => '123456789',
        'postal_code' => '12345',
        'address' => '123 Main St',
    ]);

    $this->assertDatabaseHas('customers', [
        'name' => 'John Doe',
        'email' => 'john.doe@company.com',
        'rccm_number' => '123456789',
        'postal_code' => '12345',
        'address' => '123 Main St',
    ]);
});

it('can create a customer with phone numbers', function () {
    $action = app(CreateCustomerAction::class);
    $company = Company::factory()->create();

    $action->handle($company, [
        'name' => 'John Doe',
        'email' => 'john.doe@company.com',
        'rccm_number' => '123456789',
        'postal_code' => '12345',
        'address' => '123 Main St',
        'phones' => [
            ['phone' => '1234567890'],
            ['phone' => '0987654321'],
        ],
    ]);

    expect($company->customers->first()->phones->count())->toBe(2);
    expect($company->customers->first()->phones->first()->phone)->toBe('1234567890');
});
