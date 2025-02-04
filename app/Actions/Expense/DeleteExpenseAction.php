<?php

declare(strict_types=1);

namespace App\Actions\Expense;

use App\Models\Expense;

final class DeleteExpenseAction
{
    public function handle(Expense $expense): void
    {
        $expense->delete();
    }
}
