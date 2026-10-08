# Changelog

All notable changes to `laravel-simple-analytics` will be documented in this file.

## 1.0.0 - 2026-10-08

First release.

- `@include('simple-analytics::script')` renders the Simple Analytics script once the settings are complete
- `SimpleAnalyticsSettings` stored with spatie/laravel-settings, validated before rendering
- `SimpleAnalytics` facade and `simple_analytics_settings()` helper

Requires PHP 8.2+ and Laravel 12.61+ or 13.
