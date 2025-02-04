<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\SupplierPhoneFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplierPhone extends Model
{
    /** @use HasFactory<SupplierPhoneFactory> */
    use HasFactory;

    /**
     * Get the supplier that owns the phone.
     * @return BelongsTo<Supplier, $this>
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
