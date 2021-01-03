@component('mail::message')
# New Password

The code is {{ $code }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
