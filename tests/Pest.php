<?php

use JeffersonGoncalves\SimpleAnalytics\Settings\SimpleAnalyticsSettings;
use JeffersonGoncalves\SimpleAnalytics\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

/**
 * Saves the given values on top of the stored Simple Analytics settings.
 *
 * @param  array<string, mixed>  $values
 */
function simple_analytics(array $values): SimpleAnalyticsSettings
{
    $settings = app(SimpleAnalyticsSettings::class);
    foreach ($values as $name => $value) {
        $settings->{$name} = $value;
    }
    $settings->save();

    return $settings;
}
