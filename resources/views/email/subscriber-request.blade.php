@component('mail::message')
# Hi,

<table border="0">

<tr class="warning">
<td>Email:</td>
<td>{{$subscriber->email ?? ''}}</td>
</tr>
</table>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
