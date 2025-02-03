<?php

declare(strict_types=1);

namespace App\Actions\Income;

use App\Models\Income;

final class UpdateIncomeAction
{
    /**
     * Update the income.
     *
     * @param  array<string, string|int>  $attributes
     */
    public function handle(Income $income, array $attributes): void
    {
        $income->update($attributes);
    }
}
