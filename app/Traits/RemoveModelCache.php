<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait RemoveModelCache
{

    public static function bootRemoveModelCache()
    {
        static::created(function () {
            static::removeCache();
        });

        static::updated(function () {
            static::removeCache();
        });

        static::deleting(function () {
            static::removeCache();
        });
    }

    protected static function removeCache() : void
    {
        $key = self::getClassName();
        if(Cache::has($key))Cache::forget($key);
    }

    public function update(array $attributes = [], array $options = [])
    {
        static::removeCache();
        return parent::update($attributes, $options);
    }

    public static function getClassName()
    {
        $classArray = explode('\\',get_class());
        return end($classArray);
    }
}
