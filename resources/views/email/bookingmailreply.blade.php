@component('mail::message')

Dear {{ $booking->first_name}} {{ @$booking->last_name}},

Payment of {{$booking->currency  ?? ''}} {{$booking->amount  ?? ''}} has been made successfully.

Thank you for contacting We Trek Nepal.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
