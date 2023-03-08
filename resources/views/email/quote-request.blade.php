<div class="maildetails">
<h2 style="line-height:30px;"><b>Trip Inquiry In  </b><a href="https://www.adventuremagictreks.com/" style="color:#0270bd;">https://www.adventuremagictreks.com/</a></h2>
<h2 style="line-height:30px;"><b>Inquiry From  </b><a href="http://ip2location.com/{{ucfirst($quote->ip_address)  ?? ''}}" style="color:#0270bd;">http://ip2location.com/{{ucfirst($quote->ip_address)  ?? ''}}</a></h2>
<div class="newmailinfo" style="padding:20px;background:#f5f5f5;">
    <h3>Inquiry Detail:</h2>
    <table style="width:100%">
  <tr style="line-height:30px;">
    <td><b>Subject:</b></td>
    <td colspan="2">Inquiry For {{$package->package_name}} </td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>Name:</b></td>
    <td colspan="2">{{$quote->full_name  ?? ''}}</td>
      </tr>
      <tr style="line-height:30px;">
    <td><b>Nationality:</b></td>
    <td colspan="2">{{$quote->nationality  ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>Email:</b></td>
    <td colspan="2">{{$quote->email ?? ''}}</td>
      </tr>

<tr style="line-height:30px;">
    <td><b>Phone:</b></td>
    <td colspan="2">{{$quote->phone_number ?? ''}}</td>
    
  </tr>
  <tr style="line-height:30px;">
    <td><b>How did you find us?</b></td>
    <td colspan="2">{{ucfirst($quote->how_found)  ?? ''}} </td>
      </tr>
      <tr style="line-height:30px;">
    <td><b>Message:</b></td>
    <td colspan="2">{{ucfirst($quote->message)  ?? ''}}</td>
      </tr>

<!--<tr style="line-height:30px;">-->
<!--    <td><b>Country:</b></td>-->
<!--    <td colspan="2">Nepal</td>-->
<!--      </tr>-->

<!--<tr style="line-height:30px;">-->
<!--    <td><b>Message:</b></td>-->
<!--    <td colspan="2">Test only</td>-->
<!--      </tr>-->
<!--      <tr style="line-height:30px;">-->
<!--    <td><b>Verify Box:</b></td>-->
<!--    <td colspan="2">7868</td>-->
<!--      </tr>-->



 
</table>
</div>
</div>