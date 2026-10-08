<?php

use JeffersonGoncalves\SimpleAnalytics\Settings\SimpleAnalyticsSettings;

if (! function_exists('simple_analytics_settings')) {
    function simple_analytics_settings(): SimpleAnalyticsSettings
    {
        return app(SimpleAnalyticsSettings::class);
    }
}
