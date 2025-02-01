<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;

    /**
     * get the type of this expense
     *
     * @return BelongsTo<TypeOfExpense, $this>
     */
    public function typeOfExpense(): BelongsTo
    {
        return $this->belongsTo(TypeOfExpense::class);
    }
}
