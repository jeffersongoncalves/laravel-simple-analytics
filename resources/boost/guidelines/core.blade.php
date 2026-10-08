## Laravel Simple Analytics

### Overview
Renders the Simple Analytics script in Blade layouts. The settings are stored in the database with `spatie/laravel-settings` (`SimpleAnalyticsSettings`, group `simple_analytics`) — no config file, no `.env`.

### Usage

@verbatim
<code-snippet name="blade-include" lang="blade">
@include('simple-analytics::script')
</code-snippet>
@endverbatim

@verbatim
<code-snippet name="configure" lang="php">
$settings = simple_analytics_settings();
$settings->enabled = true;
$settings->hostname = 'example.com';
$settings->save();
</code-snippet>
@endverbatim

### Conventions
- Namespace: `JeffersonGoncalves\SimpleAnalytics`; view namespace `simple-analytics` (`simple-analytics::script`)
- The script renders only when `SimpleAnalyticsSettings::isConfigured()` is true
- Publish migrations with `php artisan vendor:publish --tag=simple-analytics-settings-migrations`
