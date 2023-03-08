<div class="row">
    <div class="col-md-12">
      <div class="ibox">

        <div class="ibox-head">
          <div class="ibox-title">Adventure Package</div>
          <div>
              <a class="btn btn-info btn-md" href="{{route('adventurepackage.create')}}">Add Adventure Package</a>
          </div>
        </div>

        <div class="ibox-body">

        <!-- <div class="clf">
            <ul class="nav nav-tabs tabs-line-right">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab-10-1" data-toggle="tab"><i class="fa fa-line-chart"></i> First</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-10-2" data-toggle="tab"><i class="fa fa-heartbeat"></i> Second</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-10-3" data-toggle="tab"><i class="fa fa-life-ring"></i> Third</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-10-1">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</div>
                <div class="tab-pane" id="tab-10-2">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</div>
                <div class="tab-pane fade" id="tab-10-3">Third tab</div>
            </div>
        </div><br> -->

        <div class="clf">
            <ul class="nav nav-tabs tabs-line nav-fill">
                <li class="nav-item">
                    <a class="nav-link {{\Request::is('admin/adventurepackage/'.$d_id.'/edit') ? 'active' : ''}}" href="{{route('adventurepackage.edit', [$d_id])}}"><i class="ti-menu"></i> Adventure Package Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{\Request::is('admin/package/*/adventurepackageitinerary/*') ? 'active' : ''}}" href="{{route('adventurepackageitinerary.create', [$d_id])}}"><i class="fa fa-calendar"></i> Itinerary</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link {{\Request::is('admin/package/*/adventurepackageequipment/*') ? 'active' : ''}}" href="{{route('adventurepackageequipment.create', [$d_id])}}"><i class="fa fa-calendar"></i> Equipment</a>
                   
                </li>
                <li class="nav-item">
                    <a class="nav-link {{\Request::is('admin/package/*/adventurepackagecostanddate/*') ? 'active' : ''}}" href="{{route('adventurepackagecostanddate.create', [$d_id])}}"><i class="fa fa-calendar"></i> Cost and Date</a>
                   
                </li>
                <li class="nav-item">
                    <a class="nav-link {{\Request::is('admin/package/*/adventurepackagegdp/*') ? 'active' : ''}}" href="{{route('adventurepackagegdp.create', [$d_id])}}"><i class="fa fa-calendar"></i> Group Discount Prices</a>
                   
                </li>
                <li class="nav-item">
                    <a class="nav-link {{\Request::is('admin/package/*/adventurepackagefaq/*') ? 'active' : ''}}" href="{{route('adventurepackagefaq.create', [$d_id])}}"><i class="fa fa-calendar"></i> Package FAQ</a>
                   
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#tab-11-3" data-toggle="tab" aria-expanded="false"><i class="fa fa-life-ring"></i> Third</a>
                </li> -->
            </ul>
            <!-- <div class="tab-content">
                <div class="tab-pane active" id="tab-11-1" aria-expanded="true">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</div>
                <div class="tab-pane" id="tab-11-2" aria-expanded="false">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</div>
                <div class="tab-pane" id="tab-11-3" aria-expanded="false">Third tab</div>
            </div> -->
        </div>
        </div>
      </div>
    </div>

</div>
