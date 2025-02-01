<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    /** @use HasFactory<\Database\Factories\IncomeFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @return BelongsTo<TypeOfIncome, $this>
     */
    public function typeOfIncome(): BelongsTo
    {
        return $this->belongsTo(TypeOfIncome::class);
    }
}
