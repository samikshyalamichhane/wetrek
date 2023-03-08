<table class="table table-bordered">
    <thead>
        <tr>
            <th>Inquiry </th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <tr class="success">
            <td>Name</td>
            <td>{{$detail->full_name  ?? ''}}</td>
        </tr>
        <tr class="warning">
            <td>Nationality</td>
            <td>{{$detail->nationality  ?? ''}}</td>
        </tr>
        
        <tr class="success">
            <td>Phone Number</td>
            <td>{{ucfirst($detail->phone_number)  ?? ''}}  </td>
        </tr>
        <tr class="warning">
            <td>Email</td>
            <td>{{$detail->email  ?? ''}}  </td>
        </tr>
        <tr class="success">
            <td>How Did they found us?</td>
            <td>{{ucfirst($detail->how_found)  ?? ''}}  </td>
        </tr>
        <tr class="warning">
            <td>Message</td>
            <td>{{$detail->message  ?? ''}}  </td>
        </tr>
        <tr class="warning">
            <td>Ip Address</td>
            <td>{{$detail->ip_address  ?? ''}}  </td>
        </tr>




    </tbody>
</table>
