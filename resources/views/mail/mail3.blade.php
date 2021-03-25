@component('mail::message')
# Hello

Kindly review the requistion from  <b>{{ $data->name }}</b>

@component('mail::button', ['url' => $url])
View Requistion
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
