@extends('front.layouts.app')
<title>WeTrek | Thank You</title>
@section('content')

<!-- ========== Package Banner ========== -->
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area jarallax" style="background-image:url({{ $dashboard_settings->contactus_banner_imageUrl() }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">Thank You</h1>
                        <ul class="page-list">
                            <li><a href="{{route('indexHome')}}">Home</a></li>
                            <li>Thank You</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->
<!-- ========== End of Package Banner ========== -->
@if( session()->get('contact') )
<section class="thankyou-wrap">
    <div class="container">
        <div class="row">
            <div class="thankyou text-center">
                <a href="#"><img src="{{asset('images/main/'.$dashboard_settings->logo)}}" alt=""></a>
                <div class="section-title color-title thanktitle">
                    <h1>THANK <span>YOU!</span></h1>
                </div>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                <p>Thank you for contacting us. We will get back to you soon . Meanwhile, if you have any questions, do not hesitate to contact us at {{ @$dashboard_settings->nepal_cell}} anytime 24X7 or email at <a href="#">{{ @$dashboard_settings->nepal_email}}</a> </p>
                <p>We look forward to your great trip with us!</p>
                <p>Thank You & Best Regards,</p>
                <p>We Trek Nepal Pvt. Ltd.<br>
                    </p>
                <div class="text-center thankyoubtn">
                    <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Back</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endif

@if( session()->get('booking-form') )
<section class="thankyou-wrap">
    <div class="container">
        <div class="row">
            <div class="thankyou text-center">
                <a href="#"><img src="{{asset('images/main/'.$dashboard_settings->logo)}}" alt=""></a>
                <div class="section-title color-title thanktitle">
                    <h1>THANK <span>YOU!</span></h1>
                </div>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                <p>Thank you for contacting us. We will get back to you soon . Meanwhile, if you have any questions, do not hesitate to contact us at {{ @$dashboard_settings->nepal_cell}} anytime 24X7 or email at <a href="#">{{ @$dashboard_settings->nepal_email}}</a> </p>
                <p>We look forward to your great trip with us!</p>
                <p>Thank You & Best Regards,</p>
                <p>We Trek Nepal Pvt. Ltd.<br>
                    </p>
                <div class="text-center thankyoubtn">
                    <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Back</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endif
@if( session()->get('quote') )
<section class="thankyou-wrap">
    <div class="container">
        <div class="row">
            <div class="thankyou text-center">
                <a href="#"><img src="{{asset('images/main/'.$dashboard_settings->logo)}}" alt=""></a>
                <div class="section-title color-title thanktitle">
                    <h1>THANK <span>YOU!</span></h1>
                </div>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                <p>Thank you for contacting us. We will get back to you soon . Meanwhile, if you have any questions, do not hesitate to contact us at {{ @$dashboard_settings->nepal_cell}} anytime 24X7 or email at <a href="#">{{ @$dashboard_settings->nepal_email}}</a> </p>
                <p>We look forward to your great trip with us!</p>
                <p>Thank You & Best Regards,</p>
                <p>We Trek Nepal Pvt. Ltd.<br>
                    </p>
                <div class="text-center thankyoubtn">
                    <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Back</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endif

@if( session()->get('subscribe') )
<section class="thankyou-wrap">
    <div class="container">
        <div class="row">
            <div class="thankyou text-center">
                <a href="#"><img src="{{asset('images/main/'.$dashboard_settings->logo)}}" alt=""></a>
                <div class="section-title color-title thanktitle">
                    <h1>THANK <span>YOU!</span></h1>
                </div>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                <p>Thank you for contacting us. We will get back to you soon . Meanwhile, if you have any questions, do not hesitate to contact us at {{ @$dashboard_settings->nepal_cell}} anytime 24X7 or email at <a href="#">{{ @$dashboard_settings->nepal_email}}</a> </p>
                <p>We look forward to your great trip with us!</p>
                <p>Thank You & Best Regards,</p>
                <p>We Trek Nepal Pvt. Ltd.<br>
                    </p>
                <div class="text-center thankyoubtn">
                    <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Back</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endif



<!-- Modal -->
<div id="myModal" class="modal fade popupbox" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3>Thank You!!</h3>
                <h5>Your Details Has Been Successfully Submitted..</h5>
            </div>
            <div class="modal-footer contact-us">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ========== End of Contact Form ========== -->
@endsection
@push('scripts')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        @if(Session::has('message'))
        $('#myModal').modal('show');
        @endif
    });
</script>


@endpush