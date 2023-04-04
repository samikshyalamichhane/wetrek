@component('mail::message')
Dear Admin,

New Booking has been made for {{$booking->package->package_name  ?? ''}}. Payment of {{$booking->currency  ?? ''}}
{{$booking->amount  ?? ''}} has been received.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
