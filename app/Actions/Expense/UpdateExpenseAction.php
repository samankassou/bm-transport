<?php

declare(strict_types=1);

namespace App\Actions\Expense;

use App\Models\Expense;

final class UpdateExpenseAction
{
    /**
     * Update an existing expense
     *
     * @param  array<string, string|int>  $attributes
     */
    public function handle(Expense $expense, array $attributes): void
    {
        $expense->update($attributes);
    }
}
