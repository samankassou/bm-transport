<?php

namespace App\Actions;

use App\Models\Income;

class UpdateIncomeAction
{
    public function handle(Income $income, array $attributes)
    {
        $income->update($attributes);
    }
}
