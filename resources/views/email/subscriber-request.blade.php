@component('mail::message')
# Hi,

<table border="0">

<tr class="success">
<td>First Name:</td>
<td>{{$subscriber->first_name  ?? ''}}</td>
</tr>
<tr class="success">
<td>Last Name:</td>
<td>{{$subscriber->last_name  ?? ''}}</td>
</tr>
<tr class="warning">
<td>Email:</td>
<td>{{$subscriber->email ?? ''}}</td>
</tr>
</table>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
