<?php

declare(strict_types=1);

namespace App\Actions\Customer;

use App\Models\Customer;

final class CreateCustomerPhoneAction
{
    // @codeCoverageIgnoreStart
    /**
     * Handle creating a customer phone.
     *
     * @param  Customer  $customer
     * @param  array<string, string>  $attributes
     */
    public function handle(Customer $customer, array $attributes): void
    {
        $customer->phones()->create($attributes);
    }
    // @codeCoverageIgnoreEnd
}
