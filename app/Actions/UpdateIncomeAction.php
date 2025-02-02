<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Income;

final class UpdateIncomeAction
{
    /**
     * Update the income.
     *
     * @param Income $income
     * @param array<string, string|int> $attributes
     */
    public function handle(Income $income, array $attributes): void
    {
        $income->update($attributes);
    }
}
