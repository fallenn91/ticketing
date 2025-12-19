@props(['date', 'live' => true, 'resetEvent' => null, 'short' => false])

@php
$timestamp = $date->timestamp;
$widthClass = $short ? '' : 'min-w-32 whitespace-nowrap';

if ($short) {
    $diff = $date->diffInSeconds(now());
    if ($diff < 60) {
        $initial = $diff . 's';
    } elseif ($diff < 3600) {
        $initial = floor($diff / 60) . 'min';
    } elseif ($diff < 86400) {
        $initial = floor($diff / 3600) . 'h';
    } else {
        $initial = floor($diff / 86400) . 'd';
    }
} else {
    $initial = $date->diffForHumans();
}
@endphp

@if($live)
<span
    x-data="{
        timestamp: {{ $timestamp }},
        display: '{{ $initial }}',
        short: {{ $short ? 'true' : 'false' }},
        update() {
            const seconds = Math.floor(Date.now() / 1000) - this.timestamp;
            if (this.short) {
                if (seconds < 60) {
                    this.display = seconds + 's';
                } else if (seconds < 3600) {
                    this.display = Math.floor(seconds / 60) + 'min';
                } else if (seconds < 86400) {
                    this.display = Math.floor(seconds / 3600) + 'h';
                } else {
                    this.display = Math.floor(seconds / 86400) + 'd';
                }
            } else {
                if (seconds < 60) {
                    this.display = seconds <= 1 ? 'hace 1 segundo' : 'hace ' + seconds + ' segundos';
                } else if (seconds < 3600) {
                    const mins = Math.floor(seconds / 60);
                    this.display = mins === 1 ? 'hace 1 minuto' : 'hace ' + mins + ' minutos';
                } else if (seconds < 86400) {
                    const hours = Math.floor(seconds / 3600);
                    this.display = hours === 1 ? 'hace 1 hora' : 'hace ' + hours + ' horas';
                } else {
                    const days = Math.floor(seconds / 86400);
                    this.display = days === 1 ? 'hace 1 día' : 'hace ' + days + ' días';
                }
            }
        }
    }"
    x-on:relative-time-tick.window="update()"
    @if($resetEvent)
    x-on:{{ $resetEvent }}.window="timestamp = Math.floor(Date.now() / 1000); update()"
    @endif
    {{ $attributes->merge(['class' => 'inline-block ' . $widthClass]) }}
    x-text="display"
></span>
@else
<span {{ $attributes->merge(['class' => 'inline-block ' . $widthClass]) }}>{{ $initial }}</span>
@endif

@once
<script>
(function() {
    if (window.__relativeTimeTicker) return;
    window.__relativeTimeTicker = setInterval(() => {
        window.dispatchEvent(new CustomEvent('relative-time-tick'));
    }, 1000);
})();
</script>
@endonce
