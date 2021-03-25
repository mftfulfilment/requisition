@component('mail::message')
# Hello

Your requisitionhas been {{ $status }}

{{ $reason }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
