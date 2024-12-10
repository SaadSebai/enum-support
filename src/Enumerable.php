<?php

namespace Saad\EnumSupport;

use Illuminate\Support\Arr;

trait Enumerable
{
    /**
     * Get an array of all the enum values.
     *
     * @return array
     */
    public static function values(): array
    {
        return Arr::pluck(self::cases(), 'value');
    }

    /**
     * Get an array of all the enum names.
     *
     * @return array
     */
    public static function names(): array
    {
        return Arr::pluck(self::cases(), 'name');
    }

    /** Retrieve a specific enum case by its name.
     *
     * @param  string $name
     * @return self|null
     */
    public static function getByName(string $name): ?self
    {
        return collect(self::cases())->where(fn ($case) => $case->name == strtoupper($name))?->first();
    }


    /** Retrieve a specific enum case by its value.
     *
     * @param  string $value
     * @return self|null
     */
    public static function getByValue(string $value): ?self
    {
        return collect(self::cases())->where(fn ($case) => $case->value == $value)?->first();
    }

    /**
     * Translate an enum.
     *
     * @param  string $path
     * @return string
     */
    public function translate(string $path): string
    {
        return __("{$path}.{$this->value}");
    }
}
