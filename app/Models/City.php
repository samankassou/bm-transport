<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class City extends Model
{
    /** @use HasFactory<CityFactory> */
    use HasFactory;
}
