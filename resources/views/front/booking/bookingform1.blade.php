@extends('front.layouts.app')
@section('title','Adventure Magic | Teams')
@section('content')
<!--<div class="booking-image">-->
<!--            <img src="https://classicvacationsnepal.com/images/main/Wed-07-23-37-1176753327-EBC.jpg" alt="" class="img-fluid">-->
<!--       </div>-->
<div class="tourmaster-single-header" style="background-image: url('https://classicvacationsnepal.com/images/main/Mon-03-10-37-959451343-globalpedia-hero-nepal-1.jpg');">
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
<section class="booking-form-wrap">
    <div class="container">
        <!--<div class="about-title">-->
        <!--    <h1>Booking Form</h1>-->
        <!--</div>-->
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('success') !!}
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
                                            <option value="{{$package->id}}">{{$package->package_name}}</option>
                                            @endforeach
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
                                        <label for="name" class=""><i class="fa fa-calendar" aria-hidden="true"></i>Select From Date:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" id="name" name="from_date" class="form-control" value="{{old('from_date')}}" placeholder="12-jun-2022 to 26-jun-2022">
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
                                        <label for="name" class=""><i class="fa fa-calendar" aria-hidden="true"></i>Select To Date:</label>
                                    </div>
                                    <div class="col-md-9">
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
                                        <select name="no_of_traveller" class="form-control" id="no_of_traveller">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
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
                                                        <input type="text" id="name" name="first_name[]" class="form-control" placeholder="Write here" required>
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
                                                        <input type="text" id="name" name="last_name[]" class="form-control" placeholder="Write here" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">DOB:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="date" id="name" name="dob[]" class="form-control" placeholder="Select Date" required>
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
                                                        <select name="country[]" class="form-control" id="exampleFormControlSelect1" required>
                                                            <option value="germany">Germany</option>
                                                            <option value="nepal">Nepal</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Passport No:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="passport_no[]"  class="form-control" placeholder="Write here" required>
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
                                                        <input type="email" id="name" name="email[]" class="form-control"  placeholder="Write here" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3 po">
                                                        <label for="name" class="">Contact No:</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="contact[]"  class="form-control" placeholder="Write here" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="newRow"></div>
                        <!-- </form> -->
                        <!-- <div class="text-right nexttraveller">
                            <button id="Mybtn" class="btn btn-primary">Next Traveller <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                        </div> -->

                        <!-- <div class="traveller-detail">
                            <form id="MyForm" action="" method="post">
                                <h4>Next Traveller Detail:</h4>
                                <div class="common-form">
                                    <div class="text-right closebtn">
                                        <a href="https://classicvacationsnepal.com/booking-form" id="Mybtn1" class="btn btn-primary"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
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
                                                                <select class="form-control" id="exampleFormControlSelect1">
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
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Write here">
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
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Write here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-3 po">
                                                                <label for="name" class="">DOB:</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Select Date">
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
                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                    <option>Germany</option>
                                                                    <option>Nepal</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-3 po">
                                                                <label for="name" class="">Passport No:</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Write here">
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
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Write here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-3 po">
                                                                <label for="name" class="">Contact No:</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Write here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                    <div class="emergency-contact">
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
                    </div>
                    <div class="bottom-info">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="name" class="">How Did you found us?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="how_found" class="form-control" id="exampleFormControlSelect1">
                                                <option value="past_traveller">Past Travellers</option>
                                                <option value="social_media">Social Media</option>
                                                <!-- <option value="">Past Travellers</option>
                                                    <option value="">Past Travellers</option> -->

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
                                        <div class="col-md-4">
                                            <label for="message">Special Requirement</label>
                                        </div>
                                        <div class="col-md-8">
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
                        <p>These booking terms & conditions are a legal agreement between the customers and the company,classic Vacations Nepal(TravelServices Provider) for booking a trip with us.</p>
                        <div class="text-right rm">
                            <a href="#">Read More</a>
                        </div>
                        <div class="form-check rform">
                            <input class="form-check-input" type="radio" name="terms_and_conditions" id="exampleRadios2">
                            <label class="form-check-label" for="exampleRadios2">
                                I agree to Travel Terms & Booking Conditions.
                            </label>
                        </div>
                        <div class="contact-us">
                            <button type="submit" class="btn btn-link">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#plus').click(function() {
            debugger

        });
    });
    $("#no_of_traveller").on("change", function() {
        var number = parseInt($("#no_of_traveller").val());
        var html = '';
        var fieldHTML = `<div class="traveller-detail">
                            <h4>Next Traveller Detail:</h4>
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
                                                            <select name="country[]" class="form-control" id="exampleFormControlSelect1">
                                                                <option value="germany">Germany</option>
                                                                <option value="nepal">Nepal</option>

                                                            </select>
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
        for (i = 0; i < number - 1; i++) {
            html += fieldHTML
        };
        $(".newRow").html(html);
    })
</script>

@endpush