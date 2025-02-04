<?php

namespace App\Models;

use Database\Factories\SupplierFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    /** @use HasFactory<SupplierFactory> */
    use HasFactory;

    /**
     * Get the company that owns the supplier.
     * @return BelongsTo<Company, $this>
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the supplier type.
     * @return BelongsTo<SupplierType, $this>
     */
    public function supplierType(): BelongsTo
    {
        return $this->belongsTo(SupplierType::class);
    }

    /**
     * Get the country of the supplier.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the city of the supplier.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * get the supplier phones
     * @return HasMany<SupplierPhone, $this>
     */
    public function phones(): HasMany
    {
        return $this->hasMany(SupplierPhone::class);
    }
}
