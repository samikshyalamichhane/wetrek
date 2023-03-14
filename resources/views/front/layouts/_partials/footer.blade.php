  <!-- footer area start -->
  <footer class="footer-area" style="background-image: url(assets/img/bg/footerbg.png);">
      <div class="container">

          <div class="row">
              <div class="col-lg-2 col-md-3">
                  <div class="footer-widget widget">
                      <div class="about_us_widget">


                          <div class="footer-widget widget">
                              <h4 class="widget-title">Travel Guide</h4>
                              <ul class="widget_nav_menu">
                                  <li><a href="{{route('pagesDetail',['nepal-visa'])}}">Nepal Visa</a></li>
                                  <li><a href="{{route('pagesDetail',['accomodation'])}}">Accommodations</a></li>
                                  <li><a href="{{route('pagesDetail',['best-time-to-travel'])}}">Best Time to Travel</a></li>
                                  <li><a href="{{route('pagesDetail',['who-we-are'])}}">Who We Are</a></li>
                                  <li><a href="{{route('pagesDetail',['why-travel-with-us'])}}">Why Travel With Us</a></li>
                              </ul>
                          </div>


                      </div>
                  </div>
              </div>

              <div class="col-lg-2 col-md-3">
                  <div class="footer-widget widget">
                      <h4 class="widget-title">Treks by Region</h4>
                      <ul class="widget_nav_menu">
                          @foreach($dashboard_destination_types as $destination)
                          <li><a href="{{route('resolvepath.show',$destination->slug)}}">{{$destination->title}}</a></li>
                          @endforeach
                      </ul>
                  </div>
              </div>

              <div class="col-lg-2 col-md-3">
                  <div class="footer-widget widget">
                      <h4 class="widget-title">About Us</h4>
                      <ul class="widget_nav_menu">
                          <li><a href="{{route('pagesDetail',['who-we-are'])}}">Who We Are</a></li>
                          <li><a href="{{route('pagesDetail',['why-we-trek'])}}">Why We Trek</a></li>
                          <li><a href="{{route('team')}}">Our Team</a></li>
                          <li><a href="{{route('pagesDetail',['terms-and-condition'])}}">Terms & Conditions</a></li>
                          <li><a href="{{route('getTestimonial')}}">Testimonial</a></li>
                          <li><a href="{{route('pagesDetail',['csr'])}}">CSR</a></li>
                          <li><a href="{{route('blogList')}}">Blogs</a></li>


                      </ul>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3">
                  <div class="footer-widget widget ">
                      <div class="widget-contact">
                          <h4 class="widget-title">Nepal Contact Adress</h4>
                          <p>
                              <i class="fa fa-map-marker"></i>
                              <span>{{ $dashboard_settings->nepal_location}}</span>
                          </p>

                          <p class="telephone">
                              <i class="fa fa-phone base-color"></i>
                              <span>
                                  {{ $dashboard_settings->nepal_office_phone}}
                              </span>
                          </p>

                          <p class="telephone">
                              <i class="fa fa-mobile base-color"></i>
                              <span>
                                  {{ $dashboard_settings->nepal_office_phone}}<br>
                                  {{ $dashboard_settings->nepal_cell}}
                              </span>
                          </p>

                          <p class="location">
                              <i class="fa fa-envelope-o"></i>
                              <span>{{ $dashboard_settings->nepal_email}}</span>
                          </p>

                      </div>
                  </div>
              </div>


              <div class="col-lg-3 col-md-3">
                  <div class="footer-widget widget ">
                      <div class="widget-contact">
                          <h4 class="widget-title">Australia Contact Address</h4>
                          <p>
                              <i class="fa fa-map-marker"></i>
                              <span>{{ $dashboard_settings->australia_location}}
                                  Contact person: {{ $dashboard_settings->australia_contact}}</span>
                          </p>

                          <p class="telephone">
                              <i class="fa fa-phone base-color"></i>
                              <span>
                                  {{ $dashboard_settings->australia_office_phone_1 }}
                              </span>
                          </p>

                          <p class="telephone">
                              <i class="fa fa-mobile base-color"></i>
                              <span>
                                  {{ $dashboard_settings->australia_cell }}
                              </span>
                          </p>

                          <p class="location">
                              <i class="fa fa-envelope-o"></i>
                              <span>{{ $dashboard_settings->australia_email }}</span>
                          </p>

                          <p class="location">
                              <i class="fa fa-globe"></i>
                              <span>{{ $dashboard_settings->australia_email_1 }}</span>
                          </p>

                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="footer-bottom">

          <div class="container">
              <div class="row">
                  <div class="col-md-3">
                      <img src="{{ $dashboard_settings->logoUrl() }}">

                  </div>

                  <div class="col-md-6 footerborder">
                      <p>Adventure Travel & Trekking Company in Nepal</p>
                      <p>
                          Copyright © We Trek Nepal-2023</p>

                  </div>

                  <div class="col-md-3">
                      <div class="footer-logo flogo">
                          <p class="text-right">Developed By:<a href="https://webhousenepal.com/"><img src="{{asset('assets/front/img/logo.svg')}}" alt="" target="blank" rel="nofollow"></a></p>
                      </div>
                  </div>
              </div>


          </div>
      </div>

  </footer>
  <!-- footer area end -->

  <!-- back to top area start -->
  <div class="back-to-top">
      <span class="back-top"><i class="fa fa-angle-up"></i></span>
  </div>
  <!-- back to top area end -->


  <!-- Additional plugin js -->
  <script src="{{asset('assets/front/js/jquery-2.2.4.min.js')}}"></script>
  <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.magnific-popup.js')}}"></script>
  <script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/front/js/wow.min.js')}}"></script>
  <script src="{{asset('assets/front/js/slick.js')}}"></script>
  <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/front/js/waypoints.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.counterup.min.js')}}"></script>
  <script src="{{asset('assets/front/js/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/front/js/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/front/js/swiper.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery-ui.min.js')}}"></script>

  <!-- main js -->
  <script src="{{asset('assets/front/js/main.js')}}"></script>

  </body>

  </html>