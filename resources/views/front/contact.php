@extends('front.layouts.app')
@section('title','Teams')
@section('content')

{{-- {{asset('assets/front/    ')}} --}}

 <!-- ========== Package Banner ========== -->
 <div class="tourmaster-single-header" style="background-image: url('{{asset('images/main/'.$dashboard_settings->team_banner_image)}}');">
    <div class="tourmaster-single-header-background-overlay"></div>
    <div class="tourmaster-single-header-overlay"></div>

    <div class="tourmaster-single-header-container tourmaster-container">
        <div class="tourmaster-single-header-container-inner">
            <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                <div class="container">
                    <div class="row">
                        <div class="COL-12 trip-topic triphead-block p-0">
                            <div class="tourmaster-single-header-gallery-wrap"></div>

                            <h1 class="tourmaster-single-header-title">Contact Us</p>
                            </h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ========== End of Package Banner ========== -->

<!-- ========== Contact Form ========== -->
<section class="contact-us common-title">
        <div class="container">
            <h1>Let's get in touch</h1>
            <div class="row contact-list">
                <div class="col-md-5">
                    <div class="row mb-4">
                        <div class="col-md-2 conatct-icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="col-md-10">
                            <h6>Support </h6>
                            <p>9801905239,9801905240<br>support@webhousenepal.com </p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <img src="images/loc.jpg" alt="">
                        </div>
                        <div class="col-md-10">
                            <h6>Business</h6>
                            <p>9801905238, 014794680</p>
                            <p>marketing@webhousenepal.com</p>
                            <p>info@webhousenepal.com </p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <img src="images/email.jpg" alt="">
                        </div>
                        <div class="col-md-10">
                            <h6>Our Location </h6>
                            <p>Shankhamul, New Baneshwor<br>Kathmandu </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <form>
                        <div class="col-md-12">
                            <div class="md-form mb-3">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name*">
                            </div>
                            <div class="md-form mb-3">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Phone*">
                            </div>
                            <div class="md-form mb-3">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Email*">
                            </div>
                            <div class="md-form mb-3">
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="">Your Message*</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"></div>
                            </div>
                            <button type="button" class="btn btn-link">Submit</button>
                        </div>
                        <!--Grid row-->
                    </form>
                </div>
            </div>
        </div>
    </section>
<!-- ========== End of Contact Form ========== -->

<section class="contact-form common-title">
  <div class="container">
    <div class="getintouch">
      <h2>Get In Touch With Us</h2>
      
    </div>
    <div class="row contact-list">
      <div class="col-md-5">
        <div class="row mb-4">
          <div class="col-md-2">
            <img src="images/loc.jpg" alt="">
          </div>
          <div class="col-md-10">
            <h6>Location:</h6>
            <p>Teku Road,Kathmandu<br>Nepal</p>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-2">
            <img src="images/loc.jpg" alt="">
          </div>
          <div class="col-md-10">
            <h6>Phone:</h6>
            <p>+977 14100152</p>
            <p>+977 14100152</p>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-2">
            <img src="images/email.jpg" alt="">
          </div>
          <div class="col-md-10">
            <h6>Mail:</h6>
            <p>info@rajeshhardwares.com</p>
            </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <img src="images/fax.jpg" alt="">
          </div>
          <div class="col-md-10">
            <h6>Fax:</h6>
            <p>246412658</p>
            </div>
        </div>
      </div>
      <div class="col-md-7">
        <form >
            <div class="row">
              <div class="col-md-6">
                        <div class="md-form">
                            <label for="name" class="">Name*</label>
                            <input type="text" id="name" name="name" class="form-control">
                            
                        </div>
                    </div>
              <div class="col-md-6">
                        <div class="md-form">
                          <label for="email" class="">Email*</label>
                            <input type="text" id="email" name="email" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
              <div class="col-md-6">
                        <div class="md-form">
                            <label for="name" class="">Phone*</label>
                            <input type="text" id="name" name="name" class="form-control">
                            
                        </div>
                    </div>
              <div class="col-md-6">
                        <div class="md-form">
                          <label for="email" class="">Website*</label>
                            <input type="text" id="email" name="email" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
              <div class="col-md-12">

                        <div class="md-form">
                          <label for="message">Message*</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder=""></textarea>
                            
                        </div>
                          <button type="button" class="btn btn-link">Submit Now</button>
                    </div>

                </div>
                <!--Grid row-->

            </form>
      </div>
    </div>
  </div>
  
</section>
@endsection
