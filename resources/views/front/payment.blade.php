@extends('front.layouts.app')
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area jarallax" style="background-image:url({{ $dashboard_settings->contactus_banner_imageUrl() }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">Payment Form</h1>
                        <ul class="page-list">
                            <li><a href="{{route('indexHome')}}">Home</a></li>
                            <li>Payment Form</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->
<div class="contact-us nnba">
    <div class="container">
        <h1>Welcome to our<span> Online Payment Form</span></h1>
        <p>
            For online payments at We Trek Nepal, you could use Credit Card, AMEX, Visa Card, Mastercard etc. Our online payments are secured, and powered by Visa Card so it is a safe process. Your card payment will be processed by Himalayan Bank Limited on behalf of We Trek Nepal Pvt. Ltd.
        </p>
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
                <form action="{{route('cardPaymentBooking')}}" id="onlinepaymentform" method="POST">
                    @csrf
                    <!-- <input type="tel" id="success_url" name="input_3d" class="form-textbox" size="50" value="N" hidden> -->
                    <span>
                        <input type="tel" id="success_url" name="success_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-success/'}}" hidden>
                    </span>
                    <span>
                        <input type="tel" id="fail_url" name="fail_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-fail/'}}" hidden>
                    </span>
                    <span>
                        <input type="tel" id="cancel_url" name="cancel_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-cancel/'}}" hidden>
                    </span>
                    <span>
                        <input type="tel" id="backend_url" name="backend_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/get-response/'}}" hidden>
                    </span>
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
                                            <option id="packagenamemodal" value="{{$package->id}}" hidden>{{$package->package_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- <div class="row">
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
                    </div> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class=""><i class="fa fa-users" aria-hidden="true"></i>Name of Traveller:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="namemodal" name="name" class="form-control" placeholder="Write here" required>
                                    </div>
                                </div>
                            </div>
                            <div class="md-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class=""><i class="fa fa-users" aria-hidden="true"></i>Email:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" id="emailmodal" name="email" class="form-control" placeholder="Write here" required>
                                    </div>
                                </div>
                            </div>
                            <div class="md-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class=""><i class="fa fa-users" aria-hidden="true"></i>Amount To Pay:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number " id="amountmodal" name="amount" class="form-control" placeholder="Write here" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="booking-conditions">
                        <div class="contact-us">
                            <button type="button" class="btn btn-link" id="submitOnline">Submit</button>
                            <!-- <button type="submit" class="btn btn-link">Submit</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade popupbox text-white" id="onlinePaymentModal" role="dialog">
    <div class="modal-dialog" style="max-width: 650px; bottom: -150px;">
        <!-- Modal content-->
        {{--<form action="{{route('makePayment')}}" method="POST">
        @csrf--}}
        <div class="modal-content" style="height: 340px;">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title" style="font-size: 25px;">Re-confirm </h4>
            </div>
            <div class="modal-body" style="font-size: 18px;">
                Hi, <span id="traveller_names"></span>, <br>

                Please Re-confirm Your Entry. <br>

                Package Name:: <span id="package_name"></span> <br>
                Name:: <span id="traveller_name"></span> <br>
                Email:: <span id="traveller_email"></span> <br>
                Amount:: <span id="amount_to_pay"></span> <br>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-success" data-dismiss="modal">Back</a>
                <button type="submit" class="btn btn-default" onClick='submitDetailsForm()'>Submit</button>

            </div>
        </div>
        <!-- </form> -->

    </div>
</div>

@endsection


@push('scripts')
<script type="text/javascript">
    $('#exampleFormControlSelect1').change(function() {

        $('#submitOnline').click(function() {
            var val1 = $("#namemodal").val();
            var val2 = $("#emailmodal").val();
            var val3 = $("#amountmodal").val();
            var val4 = $('#exampleFormControlSelect1 option:selected').text();
            $("#onlinePaymentModal").modal("show");
            $('#package_name').empty()
            $('#traveller_email').empty()
            $('#traveller_name').empty()
            $('#amount_to_pay').empty()
            $('#package_name').append(val4)
            $('#traveller_email').append(val2)
            $('#traveller_name').append(val1)
            $('#traveller_names').append(val1)
            $('#amount_to_pay').append(val3)
            return false;

        });
    });
</script>
<script language="javascript" type="text/javascript">
    function submitDetailsForm() {
        $("#onlinepaymentform").submit();
    }
</script>

@endpush