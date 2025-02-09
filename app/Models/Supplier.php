<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasCompany;
use Database\Factories\SupplierFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Supplier extends Model
{
    use HasCompany;

    /** @use HasFactory<SupplierFactory> */
    use HasFactory;

    /**
     * Get the supplier type.
     *
     * @return BelongsTo<SupplierType, $this>
     */
    public function supplierType(): BelongsTo
    {
        return $this->belongsTo(SupplierType::class);
    }

    /**
     * Get the country of the supplier.
     *
     * @return BelongsTo<Country, $this>
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the city of the supplier.
     *
     * @return BelongsTo<City, $this>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * get the supplier phones
     *
     * @return HasMany<SupplierPhone, $this>
     */
    public function phones(): HasMany
    {
        return $this->hasMany(SupplierPhone::class);
    }
}
