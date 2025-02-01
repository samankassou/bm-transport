<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

final class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;

    public static function getValue(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever('setting:'.$key, function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            if ($setting) {
                return match ($setting->type) {
                    'integer' => (int) $setting->value,
                    'boolean' => (bool) $setting->value,
                    'json' => json_decode((string) $setting->value, true),
                    default => $setting->value,
                };
            }

            return $default;
        });
    }

    public static function setValue(string $key, mixed $value, string $type = 'string'): void
    {
        $setting = self::where('key', $key)->first();

        if ($setting) {
            $setting->update(['value' => $value, 'type' => $type]);
        } else {
            self::create(['key' => $key, 'value' => $value, 'type' => $type]);
        }

        Cache::forget('setting:'.$key);
    }
}
