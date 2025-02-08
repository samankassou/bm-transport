<?php

declare(strict_types=1);

namespace App\Actions\Customer;

use App\Models\Company;
use Illuminate\Support\Facades\DB;

final class CreateCustomerAction
{
    /**
     * Handle creating a customer.
     *
     * @param  array<string, string>  $attributes
     * @param  array<string, mixed>  $phones
     */
    public function handle(Company $company, array $attributes, array $phones = []): void
    {
        DB::transaction(function () use ($company, $attributes, $phones): void {
            $customer = $company->customers()->create($attributes);
            foreach ($phones as $phone) {
                $customer->phones()->create($phone);
            }
        });
    }
}
