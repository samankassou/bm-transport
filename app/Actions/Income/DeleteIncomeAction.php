<?php

declare(strict_types=1);

namespace App\Actions\Income;

use App\Models\Income;

final class DeleteIncomeAction
{
    public function handle(Income $income): void
    {
        $income->delete();
    }
}
