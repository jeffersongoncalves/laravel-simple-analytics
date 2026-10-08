<?php

namespace JeffersonGoncalves\SimpleAnalytics\Settings;

use Spatie\LaravelSettings\Settings;

class SimpleAnalyticsSettings extends Settings
{
    /** Load the Simple Analytics script. */
    public bool $enabled;

    /** Optional hostname to report the visits under (data-hostname). */
    public ?string $hostname;

    public static function group(): string
    {
        return 'simple_analytics';
    }

    /** Whether the settings are complete enough to render the script. */
    public function isConfigured(): bool
    {
        return $this->enabled;
    }

    public function hasValidHostname(): bool
    {
        return preg_match('/^[a-z0-9.-]+\.[a-z]{2,}$/i', (string) $this->hostname) === 1;
    }
}
