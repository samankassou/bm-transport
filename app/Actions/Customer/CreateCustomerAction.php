<?php

declare(strict_types=1);

namespace App\Actions\Customer;

use App\Models\Company;
use Illuminate\Support\Facades\DB;

final class CreateCustomerAction
{
    public function __construct(private CreateCustomerPhoneAction $createCustomerPhoneAction) {}

    /**
     * Handle creating a customer.
     *
     * @param  array<string, string|array<string, string>>  $attributes
     */
    public function handle(Company $company, array $attributes): void
    {
        DB::transaction(function () use ($company, $attributes): void {
            $phones = $attributes['phones'] ?? [];
            $customerData = collect($attributes)->except('phones')->toArray();
            $customer = $company->customers()->create($customerData);
            $customer->phones()->createMany($phones);
        });
    }
}
