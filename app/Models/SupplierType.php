<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasCompany;
use Database\Factories\SupplierTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class SupplierType extends Model
{
    use HasCompany;

    /** @use HasFactory<SupplierTypeFactory> */
    use HasFactory;

    /**
     * Get the suppliers for the supplier type.
     *
     * @return HasMany<Supplier, $this>
     */
    public function suppliers(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }
}
