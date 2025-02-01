<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class TypeOfIncome extends Model
{
    /** @use HasFactory<\Database\Factories\TypeOfIncomeFactory> */
    use HasFactory;

    /**
     * Incomes related to this
     *
     * @return HasMany<Income, $this>
     */
    public function incomes(): HasMany
    {
        return $this->hasMany(Income::class);
    }
}
