@extends('front.layouts.app')
@section('title','Adventure Magic | Booking Form')
@section('content')
<!--<div class="booking-image">-->
<!--            <img src="https://classicvacationsnepal.com/images/main/Wed-07-23-37-1176753327-EBC.jpg" alt="" class="img-fluid">-->
<!--       </div>-->
<div class="tourmaster-single-header inner-image" style="background-image: url('https://classicvacationsnepal.com/images/main/Mon-03-10-37-959451343-globalpedia-hero-nepal-1.jpg');">
    <div class="inner-overlay"></div>
    <div class="tourmaster-single-header-background-overlay"></div>
    <div class="tourmaster-single-header-overlay"></div>

    <div class="tourmaster-single-header-container tourmaster-container">
        <div class="tourmaster-single-header-container-inner">
            <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                <div class="container">
                    <div class="row">
                        <div class="COL-12 trip-topic triphead-block p-0">
                            <div class="tourmaster-single-header-gallery-wrap"></div>

                            <h1 class="tourmaster-single-header-title">Booking Form<p></p>
                            </h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="contact-us nnba same-title mt-3">
    <div class="container">
    <h1>Welcome to our<span> Booking Form</span></h1>
    </div>
</div>
<section class="booking-form-wrap">
    <div class="container">
        <!--<div class="about-title">-->
        <!--    <h1>Booking Form</h1>-->
        <!--</div>-->
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('message') !!}
        </div>
        @endif
        @if(count($errors) > 0 )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="booking-form">
            <div class="booking-inner">
                <form action="{{route('postBookingForm')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class=""><i class="fa fa-plane" aria-hidden="true"></i>Trip Name:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="package_id" class="form-control" id="exampleFormControlSelect1">
                                            <option value="">Select Any Of the Available Packages</option>
                                            @foreach($packages as $package)
                                            <option value="{{$package->id}}" @if($package->id == $package_id) selected @endif>{{$package->package_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--<div class="row">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <div class="md-form">-->
                    <!--            <div class="row">-->
                    <!--                <div class="col-md-3">-->
                    <!--                    <label for="name" class=""><i class="fa fa-calendar" aria-hidden="true"></i>Select Date:</label>-->
                    <!--                </div>-->
                    <!--                <div class="col-md-9">-->
                    <!--                    @if($start_date != null)-->
                    <!--                    <select name="costanddate_id" class="form-control" id="exampleFormControlSelect1">-->
                    <!--                        <option value="{{$costdate_id}}">{{date('d-M-Y', strtotime($start_date))}} to {{date('d-M-Y', strtotime($end_date))}} </option>-->
                    <!--                    </select>-->
                                        <!-- <input type="text" id="name" name="costanddate_id" class="form-control" value="{{date('d-M-Y', strtotime($start_date))}} to {{date('d-M-Y', strtotime($end_date))}}  "> -->
                    <!--                    @endif-->
                    <!--                    @if($start_date == null)-->
                    <!--                    <select name="costanddate_id" class="form-control" id="exampleFormControlSelect1">-->
                    <!--                        <option value="">Select Any Of the Available Dates</option>-->
                    <!--                        @foreach($costanddates as $date)-->
                    <!--                        <option value="{{$date->id}}">{{date('d-M-Y', strtotime($date->start_date))}} to {{date('d-M-Y', strtotime($date->end_date))}}</option>-->
                    <!--                        @endforeach-->
                    <!--                    </select>-->
                    <!--                    @endif-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                     <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class=""><i class="fa fa-calendar" aria-hidden="true"></i>Select From Date:</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="name" name="from_date" class="form-control" value="{{old('from_date')}}" placeholder="12-jun-2022 to 26-jun-2022">
                                    </div>
                                    <div class="col-md-1 nes">
                                        <label for="name" class=""><i class="fa fa-calendar" aria-hidden="true"></i>Select To Date:</label>
                                    </div>
                                    <div class="col-md-5 ness">
                                        <input type="date" id="name" name="to_date" class="form-control" value="{{old('to_date')}}" placeholder="12-jun-2022 to 26-jun-2022">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class=""><i class="fa fa-users" aria-hidden="true"></i>Number of Traveller:</label>
                                    </div>
                                    <div class="col-md-9">
                                    <input type="text" id="no_of_traveller" name="no_of_traveller" class="form-control" value="{{old('no_of_traveller')}}" placeholder="Enter Number Of Travellers">
                                        <!-- <select name="no_of_traveller" class="form-control" id="no_of_traveller">
                                            <option value="1">1</option>
                                        </select> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class=""><i class="fa fa-users" aria-hidden="true"></i>Payment Type:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="payment_type" class="form-control" id="no_of_traveller">
                                            <option value="">--Select Payment-- </option>
                                            <option value="cod">Pay Later</option>
                                            <option value="hbl">Pay Now(Online)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="traveller-detail">
                        <h4>Traveller Detail:</h4>
                        <div class="common-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Mr./Mrs:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="name_title[]" class="form-control" id="exampleFormControlSelect1">
                                                            <option>Mr.</option>
                                                            <option>Mrs.</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">First Name:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="first_name[]" class="form-control" value="{{old('first_name.0')}}" placeholder="Write here" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Last Name:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="last_name[]" class="form-control" value="{{old('last_name.0')}}" placeholder="Write here" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Country:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <!-- <select name="country[]" class="form-control" id="exampleFormControlSelect1" required>
                                                            <option value="germany">Germany</option>
                                                            <option value="nepal">Nepal</option>

                                                        </select> -->
                                                        <input type="text" id="name" name="country[]"  class="form-control" value="{{old('country.0')}}" placeholder="Write here" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="row">-->
                                            <!--        <div class="col-md-3 po">-->
                                            <!--            <label for="name" class="">DOB:</label>-->
                                            <!--        </div>-->
                                            <!--        <div class="col-md-9">-->
                                            <!--            <input type="date" id="name" name="dob[]" class="form-control" value="{{old('dob.0')}}" placeholder="Select Date" required>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--<div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <div class="row">
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="row">-->
                                            <!--        <div class="col-md-3 po">-->
                                            <!--            <label for="name" class="">Country:</label>-->
                                            <!--        </div>-->
                                            <!--        <div class="col-md-9">-->
                                            <!--             <select name="country[]" class="form-control" id="exampleFormControlSelect1" required>-->
                                            <!--                <option value="germany">Germany</option>-->
                                            <!--                <option value="nepal">Nepal</option>-->

                                            <!--            </select> -->-->
                                            <!--            <input type="text" id="name" name="country[]"  class="form-control" value="{{old('country.0')}}" placeholder="Write here" required>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="row">-->
                                            <!--        <div class="col-md-3 po">-->
                                            <!--            <label for="name" class="">Passport No:</label>-->
                                            <!--        </div>-->
                                            <!--        <div class="col-md-9">-->
                                            <!--            <input type="text" id="name" name="passport_no[]"  class="form-control" value="{{old('passport_no.0')}}" placeholder="Write here" required>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                    </div>

                                </div>
                            </div>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Email:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="email" id="name" name="email[]" class="form-control" value="{{old('email.0')}}" placeholder="Write here" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Contact No:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="contact[]"  class="form-control" value="{{old('last_name.0')}}" placeholder="Write here" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- </form> -->
                         {{-- <div class="text-right nexttraveller">
                            <a id="Mybtn" style="color:white" class="btn btn-primary">Next Traveller <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </div> --}}

                        <div class="newRow"></div>
                    </div>
                   {{-- <div class="emergency-contact">
                        <h4>Emergency Contact</h4>
                        <div class="common-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Mr./Mrs:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="emer_title" class="form-control" id="exampleFormControlSelect1">
                                                            <option>Mr.</option>
                                                            <option>Mrs.</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Full Name:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="emer_name" class="form-control" value="{{old('emer_name')}}" placeholder="Write here">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Relation:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="emer_relation" class="form-control" value="{{old('emer_relation')}}" placeholder="Write here">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Contact No:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="emer_contact" class="form-control" value="{{old('emer_contact')}}" placeholder="Write Contact no">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="bottom-info">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="name" class="">How did you found us?</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="how_found" class="form-control" id="exampleFormControlSelect1">
                                            <option value=""> How did you found us?</option>
                                            <option value="internet_search">Internet Search </option>
                                            <option value="recommendation">Recommendation</option>
                                            <option value="facebook">Facebook</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="blog">Blog</option>
                                            <option value="travel_show">Travel Show</option>
                                            <option value="trip_advisor">Trip Advisor</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">


                            <div class="col-md-12">

                                <div class="md-form">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="message">Special Requirement</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea type="text" id="message" name="spec_req" rows="5" class="form-control md-textarea" placeholder="Write here">{{old('spec_req')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!-- </form> -->
                    </div>
                    <div class="booking-conditions">
                        <h5>Travel Terms and Booking Conditions.</h5>
                        <p>Make booking with 20% advance payment or full payment.</p>
                        <!--<p>These booking terms & conditions are a legal agreement between the customers and the company,Adventure Magic Treks(TravelServices Provider) for booking a trip with us.</p>-->
                        <div class="text-right rm">
                            <a href="{{route('resolvepath.show', 'terms-conditions')}}" target="_blank">Read More</a>
                        </div>
                        <div class="form-check rform">
                            <input class="form-check-input" type="radio" name="terms_and_conditions" id="exampleRadios2">
                            <label class="form-check-label" for="exampleRadios2">
                                I agree to Travel Terms & Booking Conditions.
                            </label>
                        </div>
                        <div class="contact-us mt-3">
                            <button type="submit" class="btn btn-link hvr-radial-out">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection


@push('scripts')
<script type="text/javascript">
        var maxField = 30; //Input fields increment limitation
        var addButton = $('#Mybtn'); //Add button selector
        var wrapper = $('.newRow'); //Input field wrapper
        var fieldHTML = `<div class="traveller-detail">
                            <h4>Next Traveller Detail:</h4>
                            <div class="common-form">
                                    <div class="text-right closebtn">
                                        <a href="#" id="Mybtn1" class="btn btn-primary"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                    </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3 po">
                                                            <label for="name" class="">Mr./Mrs:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select name="name_title[]" class="form-control" id="exampleFormControlSelect1">
                                                                <option>Mr.</option>
                                                                <option>Mrs.</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3 po">
                                                            <label for="name" class="">First Name:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name" name="first_name[]" class="form-control" placeholder="Write here">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3 po">
                                                            <label for="name" class="">Last Name:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name" name="last_name[]" class="form-control" placeholder="Write here">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3 po">
                                                            <label for="name" class="">DOB:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="date" id="name" name="dob[]" class="form-control" placeholder="Select Date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3 po">
                                                            <label for="name" class="">Country:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                        <input type="text" id="name" name="country[]"  class="form-control" value="{{old('country.0')}}" placeholder="Write here" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3 po">
                                                            <label for="name" class="">Passport No:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name" name="passport_no[]" class="form-control" placeholder="Write here">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3 po">
                                                            <label for="name" class="">Email:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="email" id="name" name="email[]" class="form-control" placeholder="Write here">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3 po">
                                                            <label for="name" class="">Contact No:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name" name="contact[]" class="form-control" placeholder="Write here">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>`;
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '#Mybtn1', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').remove();
            x--; //Decrement field counter
        });
    //     $("#no_of_traveller").on("change", function() {
    //     var number = parseInt($("#no_of_traveller").val());
    //     var html = '';
    //     for (i = 0; i < number-1; i++) {
    //         if(i<=3){
    //             html += fieldHTML
    //         }
    //     };
    //     $(".newRow").html(html);
    // })
</script>

@endpush