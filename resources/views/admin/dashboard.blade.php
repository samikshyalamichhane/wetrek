@extends('admin.layouts.app')
@section('title','Dashboard')
@push('admin.styles')
@endpush
@section('content')
<div class="row">

  <div class="col-sm-12">
    @include('admin.layouts._partials.messages.info')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </div>

  <div class="col-sm-12">
    <div class="row">
      @php
      $count= $dashboard_packages->count();
      @endphp
      <div class="col-sm-3">
        <div id="card1" class="card border-primary  mb-3" style="max-width: 18rem;">
          <div class="card-header" id="num">{{$count}}</div>
          <div class="card-body text-primary">
            <h3 class="card-title" id="title">Packages</h3>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a id="link" href="{{route('package.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>


      @php
      $count= $dashboard_destinations->count();
      @endphp
      <div class="col-sm-3">
        <div id="card2" class="card border-primary  mb-3" style="max-width: 18rem;">
          <div class="card-header" id="num">{{$count}}</div>
          <div class="card-body text-primary">
            <h3 class="card-title" id="title">Destinations</h3>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a id="link" href="{{route('destination.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>

      @php
      $count= $dashboard_destination_types->count();
      @endphp
      <div class="col-sm-3">
        <div id="card5" class="card border-primary  mb-3" style="max-width: 18rem;">
          <div class="card-header" id="num">{{$count}}</div>
          <div class="card-body text-primary">
            <h3 class="card-title" id="title">Destination Types</h3>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a id="link" href="{{route('destinationtype.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>

      @php
      $count= $dashboard_blogs->count();
      @endphp
      <div class="col-sm-3">
        <div id="card3" class="card border-primary  display: flex; mb-3" id="card" style="max-width: 18rem;">
          <div class="card-header" id="num">{{$count}}</div>
          <div class="card-body text-primary">
            <h3 class="card-title" id="title">Blogs</h3>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a id="link" href="{{route('blog.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>

      @php
      $count= $dashboard_bookingLists->count();
      @endphp
      <div class="col-sm-3">
        <div id="card6" class="card border-primary  display: flex; mb-3" id="card" style="max-width: 18rem;">
          <div class="card-header" id="num">{{$count}}</div>
          <div class="card-body text-primary">
            <h3 class="card-title" id="title">Bookings</h3>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a id="link" href="{{route('bookingLists')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>

      @php
      $count= $dashboard_subscriber->count();
      @endphp
      <div class="col-sm-3">
        <div id="card4" class="card border-primary  display: flex; mb-3" id="card" style="max-width: 18rem;">
          <div class="card-header" id="num">{{$count}}</div>
          <div class="card-body text-primary">
            <h3 class="card-title" id="title">Subscribers</h3>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a id="link" href="{{route('subscriberList')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>

      @php
      $count= $dashboard_quoteLists->count();
      @endphp
      <div class="col-sm-3">
        <div id="card6" class="card border-primary  display: flex; mb-3" id="card" style="max-width: 18rem;">
          <div class="card-header" id="num">{{$count}}</div>
          <div class="card-body text-primary">
            <h3 class="card-title" id="title">Inquiry Lists</h3>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a id="link" href="{{route('quoteLists')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>

      @php
      $count= $dashboard_contactMessage->count();
      @endphp
      <div class="col-sm-3">
        <div id="card7" class="card border-primary  display: flex; mb-3" id="card" style="max-width: 18rem;">
          <div class="card-header" id="num">{{$count}}</div>
          <div class="card-body text-primary">
            <h3 class="card-title" id="title">Contactus Message</h3>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a id="link" href="{{route('enquiryList')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>

    </div>



  </div>

</div>

<div class="page-content fade-in-up">
  <div class="ibox col-sm-12">
    <div class="row">
        <div class="ibox-head col-sm-6">
          <div class="ibox-title">Message From Conatctus Page</div>
        </div>

        <div class="ibox-head col-sm-6">
          <div class="ibox-title">Booking Information</div>
        </div>

        <div class="ibox-body col-sm-6">
          <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Email</th>
                <th>View</th>

              </tr>
            </thead>
            <tbody>

              @if($dashboard_contactMessage->count())
                @foreach($dashboard_contactMessage->take(5) as $key => $data)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td><a href=""  class="btn btn-success btn-sm view" data-id="{{$data->id}}"><i class="fa fa-eye"></i></a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="8">
                    You do not have any data yet.
                  </td>
                </tr>
              @endif
            </tbody>

          </table>
          <a href="{{route('enquiryList')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="ibox-body col-sm-6">
          <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <!--<th>S.N.</th>-->
                <th>No. Of Traveller</th>
                <!-- <th>Date</th> -->
                <th>Name</th>
                <th>Package Name</th>
                <th>Options </th>

              </tr>
            </thead>
            <tbody>

              @if($dashboard_bookingLists->count())
                @foreach($dashboard_bookingLists->take(5) as $key => $data)
                  <tr>
                    <!--<td>{{++$key}}</td>-->
                    <td>{{$data->no_of_traveller}}</td>
                    <td>{{$data->first_name}}</td>
                    <!-- <td>{{date('Y-m-d', strtotime($data->costanddate->start_date ?? ""))}} to {{date('Y-m-d', strtotime($data->costanddate->end_date ?? ""))}}</td> -->
                    <td>{{@$data->package->package_name}}</td>
                    <td><a href="" class="btn btn-success btn-sm booking-view" data-id="{{$data->id}}"><i class="fa fa-eye"></i></a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="8">
                    You do not have any data yet.
                  </td>
                </tr>
              @endif
            </tbody>

          </table>
          <a href="{{route('bookingLists')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
  </div>
  <div class="ibox col-sm-12">
    <div class="row">
        <div class="ibox-head col-sm-6">
          <div class="ibox-title">Inquiry Lists</div>
        </div>
        <div class="ibox-head col-sm-6">
          <!-- <div class="ibox-title">Inquiry Lists</div> -->
        </div>

        <div class="ibox-body col-sm-12">
          <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Nationality </th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>How did you found us?</th>
                <th>Message</th>

              </tr>
            </thead>
            <tbody>

              @if($dashboard_quoteLists->count())
                @foreach($dashboard_quoteLists->take(5) as $key => $data)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$data->full_name}}</td>
                    <td>{{$data->nationality}}</td>
                    <td>{{$data->phone_number}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->how_found}}</td>
                    <td>{!!  substr(strip_tags($data->message), 0, 50) !!}</td>
                    <!-- <td><a href=""  class="btn btn-success btn-sm inquiry-view" data-id="{{$data->id}}"><i class="fa fa-eye"></i></a></td> -->
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="8">
                    You do not have any data yet.
                  </td>
                </tr>
              @endif
            </tbody>

          </table>
          <a href="{{route('quoteLists')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
  </div>
</div>
<style type="text/css">
  #card1 {
    background-color: #3e3478
  }

  #card2 {
    background-color: #15d84f
  }

  #card3 {
    background-color: #d8c113
  }

  #card4 {
    background-color: #e01b8e
  }
  #card7 {
    background-color: #433b3b
  }

  #card5 {
    background-color: #1bb9e0
  }

  #card6 {
    background-color: #e0221b
  }

  #num {
    color: #ffffff
  }

  #title {
    color: #ffffff
  }

  #link {
    color: #ffffff
  }
</style>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            {{-- <h4 class="modal-title">Details</h4> --}}
          </div>
            <div class="modal-body">
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="bookingModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Booking Details</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

@endsection

@push('scripts')
    {{-- popup show --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".view").click(function(e) {
                e.preventDefault();
                id=$(this).data('id');
                $.ajax({
                    method:"post",
                    url:"{{route('viewContact')}}",
                    data:{id:id},
                    success:function(data){
                        console.log("Hello world");
                        console.log(data);
                        $('#myModal .modal-body').html(data);
                        $('#myModal').modal('show');
                    }
                });
            });
        });
    </script>
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".booking-view").click(function(e) {
        e.preventDefault();
        id=$(this).data('id');
        $.ajax({
            method:"post",
            url:"{{route('viewBooking')}}",
            data:{id:id},
            success:function(data){
                console.log(data);
                $('#bookingModal .modal-body').html(data);
                $('#bookingModal').modal('show');
            }
        });
    });
});
</script>

@endpush
