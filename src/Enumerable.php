<?php

namespace Saad\EnumSupport;

use Illuminate\Support\Arr;

trait Enumerable
{
    public static function values(): array
    {
        return Arr::pluck(self::cases(), 'value');
    }

    public static function names(): array
    {
        return Arr::pluck(self::cases(), 'name');
    }

    public static function getByName(string $name): ?self
    {
        return collect(self::cases())->where(fn ($case) => $case->name == strtoupper($name))?->first();
    }

    public static function getByValue(string $value): ?self
    {
        return collect(self::cases())->where(fn ($case) => $case->value == $value)?->first();
    }
}
