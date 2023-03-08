<table class="table table-bordered">
    <thead>
        <tr>
            <th>Booking </th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <tr class="success">
            <td>No. Of Traveller</td>
            <td>{{$detail->no_of_traveller  ?? ''}}</td>
        </tr>
        <tr class="warning">
            <td>Package Name</td>
            <td>{{$detail->package->package_name  ?? ''}}</td>
        </tr>
        <tr class="success">
            <td>Selected Date</td>
            <td>{{date('d-M-Y', strtotime(@$detail->costanddate->start_date))}} to {{date('d-M-Y', strtotime(@$detail->costanddate->end_date))}}</td>
        </tr>
        <tr class="warning">
            <td>Emergency Contact Person Name</td>
            <td>{{$detail->emer_title  ?? ''}} {{ucfirst($detail->emer_name)  ?? ''}} </td>
        </tr>
        <tr class="success">
            <td>Relation</td>
            <td>{{ucfirst($detail->emer_relation)  ?? ''}}  </td>
        </tr>
        <tr class="warning">
            <td>Contact</td>
            <td>{{$detail->emer_contact  ?? ''}}  </td>
        </tr>
        <tr class="success">
            <td>How Did they found us?</td>
            <td>{{ucfirst($detail->how_found)  ?? ''}}  </td>
        </tr>
        <tr class="warning">
            <td>Special Requirement</td>
            <td>{{$detail->spec_req  ?? ''}}  </td>
        </tr>
        <tr class="warning">
            <td>Ip Address</td>
            <td>{{$detail->ip_address  ?? ''}}  </td>
        </tr>




    </tbody>
</table>
@if(json_decode(@$detail->travellers_info))
<table class="table table-bordered">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Travellers Name</th>
            <th>DOB</th>
            <th>Country</th>
            <th>Email</th>
            <th>Contact No. </th>
            <th>Passport No. </th>
        </tr>
    </thead>
    <tbody>

  @foreach(json_decode(@$detail->travellers_info) as $key => $data)
  
  <tr>
    <td>{{++$key}}</td>
    <td>{{$data->name_title  ?? ''}} {{ucfirst($data->first_name)  ?? ''}} {{ucfirst($data->last_name)  ?? ''}}</td>
    <td>
    {{$data->dob  ?? ''}}
    </td>
    <td>{{ucfirst($data->country) ?? ''}}</td>
    <td>{{$data->email  ?? ''}}</td>
    <td>{{$data->contact  ?? ''}}</td>
    <td>{{$data->passport_no  ?? ''}}</td>
  </tr>
  @endforeach
  
</tbody>
</table>
@endif
