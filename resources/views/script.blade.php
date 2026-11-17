@php
    $cookieConsent = function_exists('cookie_consent_script_attributes') ? cookie_consent_script_attributes('simple-analytics') : '';
@endphp
@php($settings = app(\JeffersonGoncalves\SimpleAnalytics\Settings\SimpleAnalyticsSettings::class))

@if($settings->isConfigured())
    <script{!! $cookieConsent !!} @if(\Illuminate\Support\Facades\Vite::cspNonce()) nonce="{{ \Illuminate\Support\Facades\Vite::cspNonce() }}" @endif async src="https://scripts.simpleanalyticscdn.com/latest.js" @if($settings->hasValidHostname()) data-hostname="{{ $settings->hostname }}" @endif></script>
    @if($cookieConsent === '')
    <noscript><img src="https://queue.simpleanalyticscdn.com/noscript.gif" alt="" referrerpolicy="no-referrer-when-downgrade"></noscript>
    @endif
@endif
