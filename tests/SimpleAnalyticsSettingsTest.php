<?php

use JeffersonGoncalves\SimpleAnalytics\Facades\SimpleAnalytics;
use JeffersonGoncalves\SimpleAnalytics\Settings\SimpleAnalyticsSettings;

it('can resolve SimpleAnalyticsSettings from the container', function () {
    expect(app(SimpleAnalyticsSettings::class))->toBeInstanceOf(SimpleAnalyticsSettings::class);
});

it('is not configured by default', function () {
    expect(app(SimpleAnalyticsSettings::class)->isConfigured())->toBeFalse();
});

it('can update and persist settings', function () {
    simple_analytics(['enabled' => true, 'hostname' => 'example.com']);

    expect(app(SimpleAnalyticsSettings::class)->isConfigured())->toBeTrue()
        ->and(app(SimpleAnalyticsSettings::class)->enabled)->toBe(true)
        ->and(app(SimpleAnalyticsSettings::class)->hostname)->toBe('example.com');
});

it('belongs to the simple_analytics group', function () {
    expect(SimpleAnalyticsSettings::group())->toBe('simple_analytics');
});

it('can be accessed via the helper function', function () {
    expect(simple_analytics_settings())->toBeInstanceOf(SimpleAnalyticsSettings::class);
});

it('reads a persisted value through the Facade', function () {
    simple_analytics(['enabled' => true, 'hostname' => 'example.com']);

    expect(SimpleAnalytics::getFacadeRoot()->enabled)->toBe(true);
});
