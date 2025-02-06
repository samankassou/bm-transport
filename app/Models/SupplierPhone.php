<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasCompany;
use Database\Factories\SupplierPhoneFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class SupplierPhone extends Model
{
    use HasCompany;

    /** @use HasFactory<SupplierPhoneFactory> */
    use HasFactory;

    /**
     * Get the supplier that owns the phone.
     *
     * @return BelongsTo<Supplier, $this>
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
