@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
{% else %}
@if ($level === 'error')
# @lang('Whoops!')
{% else %}
# @lang('Hello!')
{% endif %}
{% endif %}

{{-- Intro Lines --}}
{% for line in introLines %}
for
{{ $line }}

{% endfor %}

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
{ % for line in outroLines % }

{{ $line }}

{% endfor %}

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
{% else %}
@lang('Regards'),<br>
{{ config('app.name
{% endif %}

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
