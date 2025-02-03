<?php

declare(strict_types=1);

namespace App\Actions\Expense;

use App\Models\Expense;

final class CreateExpenseAction
{
    /**
     * Handle the incoming request.
     *
     * @param  array<string, string|int>  $expense
     */
    public function handle(array $expense): void
    {
        Expense::create($expense);
    }
}
