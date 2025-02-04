<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\SupplierTypeFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierType extends Model
{
    /** @use HasFactory<SupplierTypeFactory> */
    use HasFactory;

    /**
     * Get the suppliers for the supplier type.
     * @return HasMany<Supplier, $this>
     */
    public function suppliers(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }
}
