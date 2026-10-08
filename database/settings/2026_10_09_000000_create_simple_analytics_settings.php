<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('simple_analytics.enabled', false);
        $this->migrator->add('simple_analytics.hostname', null);
    }
};
