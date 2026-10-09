<?php

use Illuminate\Support\Facades\Vite;

it('stamps the CSP nonce on every script tag', function () {
    Vite::useCspNonce('test-nonce');
    simple_analytics(['enabled' => true, 'hostname' => 'example.com']);
    $html = (string) $this->blade('@include("simple-analytics::script")');

    preg_match_all('/<script\b[^>]*>/', $html, $tags);

    expect($tags[0])->not->toBeEmpty()->each->toContain('nonce="test-nonce"');
});

it('renders no nonce attribute when the app uses none', function () {
    simple_analytics(['enabled' => true, 'hostname' => 'example.com']);
    $html = (string) $this->blade('@include("simple-analytics::script")');

    expect($html)->toContain('<script')->not->toContain('nonce=');
});
