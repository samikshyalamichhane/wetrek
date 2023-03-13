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
        <td>Enquiry For</td>
        <td>{{$detail->package->package_name}}</td>
      </tr>
      <tr class="success">
        <td>Email</td>
        <td>{{$detail->email}}</td>
      </tr>
      <tr class="success">
        <td>Phone/Mobile</td>
        <td>{{ $detail->phone}}</td>
      </tr>
      <tr class="success">
        <td>Nationality</td>
        <td>{{ $detail->nationality}}</td>
      </tr>
      <tr class="success">
        <td>How Did You Found Us?</td>
        <td>{{ $detail->how_found}}</td>
      </tr>
      <tr class="success">
        <td>Message</td>
        <td>{{$detail->message1}}</td>
      </tr>
      <tr class="success">
        <td>Ip Address</td>
        <td>{{$detail->ip_address ?? ''}}</td>
      </tr>

    </tbody>
  </table>