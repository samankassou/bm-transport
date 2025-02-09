<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasCompany;
use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Customer extends Model
{
    use HasCompany;

    /** @use HasFactory<CustomerFactory> */
    use HasFactory;

    /**
     * customer phones
     *
     * @return HasMany<CustomerPhone, $this>
     */
    public function phones(): HasMany
    {
        return $this->hasMany(CustomerPhone::class);
    }
}
