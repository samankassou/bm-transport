<?php

declare(strict_types=1);

namespace App\Actions\Income;

use App\Models\Income;

final class CreateIncomeAction
{
    /**
     * Handle the incoming request.
     *
     * @param  array <string, string|int>  $income
     */
    public function handle(array $income): void
    {
        Income::create($income);
    }
}
