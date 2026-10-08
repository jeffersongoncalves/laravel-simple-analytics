<?php

it('renders the Simple Analytics script once configured', function () {
    simple_analytics(['enabled' => true, 'hostname' => 'example.com']);

    $this->blade('@include("simple-analytics::script")')
        ->assertSee('scripts.simpleanalyticscdn.com/latest.js', false)
        ->assertSee('data-hostname="example.com"', false);
});

it('renders nothing while it is not configured', function () {
    simple_analytics(['enabled' => false, 'hostname' => null]);

    $this->blade('@include("simple-analytics::script")')->assertDontSee('simpleanalyticscdn.com', false);
});

it('leaves out an invalid hostname but still loads the script', function () {
    simple_analytics(['enabled' => true, 'hostname' => 'bad host"']);

    $this->blade('@include("simple-analytics::script")')
        ->assertSee('scripts.simpleanalyticscdn.com/latest.js', false)
        ->assertDontSee('data-hostname', false);
});
