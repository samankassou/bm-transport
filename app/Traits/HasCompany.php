<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCompany
{
    /**
     * Get the company
     *
     * @return BelongsTo<Company, $this>
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
