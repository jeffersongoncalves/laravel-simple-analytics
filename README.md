<div class="filament-hidden">

![Laravel Simple Analytics](https://raw.githubusercontent.com/jeffersongoncalves/laravel-simple-analytics/main/art/jeffersongoncalves-laravel-simple-analytics.png)

</div>

# Laravel Simple Analytics

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/laravel-simple-analytics.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/laravel-simple-analytics)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/laravel-simple-analytics/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/laravel-simple-analytics/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/laravel-simple-analytics.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/laravel-simple-analytics)

Add [Simple Analytics](https://www.simpleanalytics.com) — privacy-first, GDPR-compliant analytics without cookies — to your Laravel app. The settings are stored in the database with [spatie/laravel-settings](https://github.com/spatie/laravel-settings), so you can change them at runtime (e.g. from an admin panel) instead of in `.env`.

For a Filament settings page, use [jeffersongoncalves/filament-simple-analytics](https://github.com/jeffersongoncalves/filament-simple-analytics).

## Installation

```bash
composer require jeffersongoncalves/laravel-simple-analytics
```

Publish and run the settings migration:

```bash
php artisan vendor:publish --tag=simple-analytics-settings-migrations
php artisan migrate
```

## Configuration

```php
$settings = simple_analytics_settings();
$settings->enabled = true;
$settings->hostname = 'example.com';
$settings->save();
```

Or through the settings class or the Facade:

```php
use JeffersonGoncalves\SimpleAnalytics\Facades\SimpleAnalytics;
use JeffersonGoncalves\SimpleAnalytics\Settings\SimpleAnalyticsSettings;

$settings = app(SimpleAnalyticsSettings::class);
$value = SimpleAnalytics::getFacadeRoot()->enabled;
```

### Available settings

| Setting | Type | Default | Description |
|---------|------|---------|-------------|
| `enabled` | `bool` | `false` | Load the Simple Analytics script. No ID needed: visits are matched by domain. |
| `hostname` | `?string` | `null` | Optional domain to report the visits under (`data-hostname`). |

## Usage

Add the script to your Blade layout, inside `<head>`:

```blade
@include('simple-analytics::script')
```

Nothing is rendered until the settings are complete, so you can ship the include everywhere and turn Simple Analytics on later.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
