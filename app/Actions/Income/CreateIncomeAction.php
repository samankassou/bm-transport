<?php

declare(strict_types=1);

namespace App\Actions\Income;

use App\Models\Company;

final class CreateIncomeAction
{
    /**
     * Handle the incoming request.
     *
     * @param  array <string, string|int>  $attributes
     */
    public function handle(Company $company, array $attributes): void
    {
        $company->incomes()->create($attributes);
    }
}
