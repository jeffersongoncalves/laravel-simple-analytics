<?php

namespace JeffersonGoncalves\SimpleAnalytics\Facades;

use Illuminate\Support\Facades\Facade;
use JeffersonGoncalves\SimpleAnalytics\Settings\SimpleAnalyticsSettings;

/**
 * @property bool $enabled
 * @property ?string $hostname
 *
 * @see SimpleAnalyticsSettings
 */
class SimpleAnalytics extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SimpleAnalyticsSettings::class;
    }
}
