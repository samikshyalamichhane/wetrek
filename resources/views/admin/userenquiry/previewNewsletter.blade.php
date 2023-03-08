<table class="table table-bordered">
    <thead>
      <p>Newsletter</p>
    </thead>
    <tbody>
      <tr class="success">
        <td>First Name</td>
        <td>{{$detail->first_name}}</td>
      </tr>
      <tr class="success">
        <td>Last Name</td>
        <td>{{$detail->last_name}}</td>
      </tr>
      <tr class="success">
        <td>Email</td>
        <td>{{ $detail->email}}</td>
      </tr>
      <tr class="success">
        <td>Date</td>
        <td>{{$detail->created_at}}</td>
      </tr>

    </tbody>
  </table>