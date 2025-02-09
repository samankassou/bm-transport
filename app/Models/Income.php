<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasCompany;
use Database\Factories\IncomeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Income extends Model
{
    use HasCompany;

    /** @use HasFactory<IncomeFactory> */
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
