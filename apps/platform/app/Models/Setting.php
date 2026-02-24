<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $primaryKey = 'key';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['key', 'value'];

    private static array $cache = [];

    public static function get(string $key, mixed $default = null): mixed
    {
        if (isset(self::$cache[$key])) {
            return self::$cache[$key];
        }

        $value = Cache::remember("setting.{$key}", 300, function () use ($key) {
            return static::where('key', $key)->value('value');
        });

        self::$cache[$key] = $value;

        return $value ?? $default;
    }

    public static function set(string $key, ?string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("setting.{$key}");
        self::$cache[$key] = $value;
    }

    public static function getMany(array $keys): array
    {
        $result = [];
        foreach ($keys as $key) {
            $result[$key] = static::get($key);
        }

        return $result;
    }

    public static function setMany(array $settings): void
    {
        foreach ($settings as $key => $value) {
            static::set($key, $value);
        }
    }
}
