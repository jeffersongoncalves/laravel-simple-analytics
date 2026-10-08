---
name: simple-analytics-development
description: Add Simple Analytics to a Laravel app with jeffersongoncalves/laravel-simple-analytics — Blade include, settings stored in the database via spatie/laravel-settings.
---

# Laravel Simple Analytics Development

## When to use this skill

- Adding Simple Analytics to a Laravel / Blade app
- Changing the Simple Analytics settings at runtime (admin panel, seeder, tinker)
- Debugging why the Simple Analytics script doesn't show up

## Setup

```bash
composer require jeffersongoncalves/laravel-simple-analytics
php artisan vendor:publish --tag=simple-analytics-settings-migrations
php artisan migrate
```

```blade
@include('simple-analytics::script')
```

```php
$settings = simple_analytics_settings();
$settings->enabled = true;
$settings->hostname = 'example.com';
$settings->save();
```

## Settings

| Setting | Type | Default |
|---------|------|---------|
| `enabled` | `bool` | `false` |
| `hostname` | `?string` | `null` |

## Troubleshooting

- **No script in the HTML**: the settings are incomplete or invalid — check `simple_analytics_settings()->isConfigured()`.
- **Settings not found**: run the settings migration (`php artisan migrate` after publishing).
- **Filament panel**: use `jeffersongoncalves/filament-simple-analytics`, which injects the same view into panels and adds a settings page.
