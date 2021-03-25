<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ env('APP_URL') }}/logo/logo.png" class="logo" alt="Laravel Logo">
@else
{{-- {{ $slot }} --}}
<img src="{{ env('APP_URL') }}/logo/logo.png" class="logo" alt="Laravel Logo">
@endif
</a>
</td>
</tr>
