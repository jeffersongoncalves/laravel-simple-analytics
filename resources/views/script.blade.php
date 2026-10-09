@php($settings = app(\JeffersonGoncalves\SimpleAnalytics\Settings\SimpleAnalyticsSettings::class))

@if($settings->isConfigured())
    <script @if(\Illuminate\Support\Facades\Vite::cspNonce()) nonce="{{ \Illuminate\Support\Facades\Vite::cspNonce() }}" @endif async src="https://scripts.simpleanalyticscdn.com/latest.js" @if($settings->hasValidHostname()) data-hostname="{{ $settings->hostname }}" @endif></script>
    <noscript><img src="https://queue.simpleanalyticscdn.com/noscript.gif" alt="" referrerpolicy="no-referrer-when-downgrade"></noscript>
@endif
