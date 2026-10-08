<?php

namespace JeffersonGoncalves\SimpleAnalytics;

use Illuminate\Support\Facades\Config;
use JeffersonGoncalves\SimpleAnalytics\Settings\SimpleAnalyticsSettings;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SimpleAnalyticsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-simple-analytics')
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        Config::set('settings.settings', array_merge(
            Config::get('settings.settings', []),
            [SimpleAnalyticsSettings::class]
        ));
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        $settingsMigrationsPath = __DIR__.'/../database/settings';

        Config::set('settings.migrations_paths', array_merge(
            [$settingsMigrationsPath],
            Config::get('settings.migrations_paths', [])
        ));

        $this->publishes([
            $settingsMigrationsPath => database_path('settings'),
        ], 'simple-analytics-settings-migrations');
    }
}
