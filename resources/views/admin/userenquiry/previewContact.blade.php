<table class="table table-bordered">
    <thead>
      <p>Message from {{$detail->name}}</p>
    </thead>
    <tbody>
      <tr class="success">
        <td>Name</td>
        <td>{{$detail->name}}</td>
      </tr>
      <tr class="success">
        <td>Email</td>
        <td>{{$detail->email}}</td>
      </tr>
      <tr class="success">
        <td>Phone/Mobile</td>
        <td>{{ $detail->number}}</td>
      </tr>
      <tr class="success">
        <td>Message</td>
        <td>{{$detail->message}}</td>
      </tr>
      <tr class="success">
        <td>Ip Address</td>
        <td>{{$detail->ip_address ?? ''}}</td>
      </tr>

      <tr class="success">
        <td>Send Date</td>
        <td>{{$detail->created_at}}</td>
      </tr>

    </tbody>
  </table>