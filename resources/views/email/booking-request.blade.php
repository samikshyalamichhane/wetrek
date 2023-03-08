<div class="maildetails">
<h2 style="line-height:30px;"><b>Trip Inquiry In  </b><a href="https://www.adventuremagictreks.com/" style="color:#0270bd;">https://www.adventuremagictreks.com/</a></h2>
<h2 style="line-height:30px;"><b>Inquiry From  </b><a href="http://ip2location.com/{{$booking->ip_address  ?? ''}}" style="color:#0270bd;">http://ip2location.com/{{$booking->ip_address  ?? ''}}</a></h2>
<div class="newmailinfo" style="padding:20px;background:#f5f5f5;">
    <h3>Booking Detail:</h2>
    <table style="width:100%">
  <tr style="line-height:30px;">
    <td><b>Subject:</b></td>
    <td colspan="2">Booking For {{$booking->package->package_name  ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>Trip Name:</b></td>
    <td colspan="2">{{$booking->package->package_name  ?? ''}}</td>
      </tr>
      <tr style="line-height:30px;">
    <td><b>No of Travellers:</b></td>
    <td colspan="2">{{$booking->no_of_traveller  ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>From Date:</b></td>
    <td colspan="2">{{$booking->from_date  ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>To Date:</b></td>
    <td colspan="2">{{$booking->to_date  ?? ''}}</td>
    
  </tr>
  @foreach(json_decode($booking->travellers_info) as $key => $data)
  <tr style="line-height:30px;">
    <td><b>Name:</b></td>
    <td colspan="2">{{$data->name_title  ?? ''}} {{ucfirst($data->first_name)  ?? ''}} {{ucfirst($data->last_name)  ?? ''}}</td>
      </tr>

    <tr style="line-height:30px;">
    <td><b>Email:</b></td>
    <td colspan="2">{{$data->email  ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>Phone:</b></td>
    <td colspan="2">{{$data->contact  ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>Passport Number:</b></td>
    <td colspan="2">{{$data->passport_no  ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>Country:</b></td>
    <td colspan="2">{{ucfirst($data->country) ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>Date Of Birth:</b></td>
    <td colspan="2">{{$data->dob  ?? ''}}</td>
    
  </tr>
  @endforeach
  <tr style="line-height:30px;">
    <td><b>Special Requirement:</b></td>
    <td colspan="2">{{$booking->spec_req  ?? ''}}</td>
      </tr>
      <tr style="line-height:30px;">
    <td><b>How Did They Found us?:</b></td>
    <td colspan="2">{{$booking->spec_req  ?? ''}}</td>
      </tr>
</table>
</div>
</div>