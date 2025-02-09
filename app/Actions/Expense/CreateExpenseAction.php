<?php

declare(strict_types=1);

namespace App\Actions\Expense;

use App\Models\Company;

final class CreateExpenseAction
{
    /**
     * Handle the incoming request.
     *
     * @param  array<string, string|int>  $attributes
     */
    public function handle(Company $company, array $attributes): void
    {
        $company->expenses()->create($attributes);
    }
}
