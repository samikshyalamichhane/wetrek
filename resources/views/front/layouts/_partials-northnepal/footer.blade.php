    <footer class="footer" id="footer">
      <div class="footer__top">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-6 mx-auto mb-4">
                      <h3 class="footer__title">Contact Info</h3>
                      <ul class="footer__list">
                          <li>
                              <a href="#" class="footer__list--link">TelE-Phone</a>
                              <i class="fa fa-phone"></i>
                              {{$dashboard_settings->telephone}}
                          </li>
                          <li>
                              <a href="#" class="footer__list--link">Mobile</a>
                              <i class="fa fa-phone"></i>
                              {{$dashboard_settings->mobile}}
                          </li>
                          {{-- <li>
                              <a href="#" class="footer__list--link">Greece</a>
                              <i class="fa fa-phone"></i>
                              +34-8757-4556
                          </li> --}}
                          <a href="mailto:{{$dashboard_settings->email}}" class="footer__link">
                              <i class="fa fa-envelope-open-o mr-2"></i>
                              {{$dashboard_settings->email}}
                          </a>
                          
                          <span>
                              &copy; 2014-{{ now()->year }} Travel Tour<br>
                              All Rights Reserved.
                          </span>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-6 mx-auto mb-4">
                    <div class="footer__title">Recent Packages</div>
                    <ul class="footer__list border-list">
                        @foreach ($dashboard_recentPackage as $package)
                            <li>
                                <a href="{{route('popularPackageDetails', $package->slug)}}">{{$package->package_name}}</a>
                            </li>
                        @endforeach
                        {{-- <li>Tour Package</li>
                        <li>Adventure Package</li>
                        <li>Heli Tour Package</li> --}}
                    </ul>
                </div>
                  {{-- <div class="col-lg-3 col-6 mx-auto mb-4">
                      <div class="footer__title">About Us</div>
                      <ul class="footer__list border-list">
                          <li>Our Story</li>
                          <li>Tarvel Blog & Tips</li>
                          <li>Working With Us</li>
                          <li>Be Our Partner</li>
                      </ul>
                  </div> --}}

                  <div class="col-lg-3 col-6 mx-auto mb-4">
                      <div class="footer__title">Support</div>
                      <ul class="footer__list border-list">
                          <li>
                              <a href="{{route('getPages', 'terms-and-conditions')}}">Privacy & Policy</a>
                          </li>
                          <li>
                              <a href="{{route('getPages', 'contact-us')}}">Contact Channels</a>
                          </li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-6 mx-auto mb-4">
                      <div class="footer__title">Pay Safely With Us</div>
                      <p class="footer__description">
                          The payment is encrypted with an SSL protocol.
                      </p>
                      <img src="{{asset('assets/front/images/creditcard-logo.png')}}" alt="" class="img-fluid w-100">
                  </div>
              </div>
          </div>
      </div>

      <div class="footer__bottom">
          <div class="container">
              <div class="row">
                  <div class="col-12 mx-auto my-5">
                      <span class="footer__bottom--info">
                          Copyright &copy; 2022 Web House Nepal, All Rights Reserved
                      </span>
                  </div>
              </div>
          </div>
      </div>
    </footer>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/front/js/jquery.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- OWL CAROUSEL JS -->
    <script src="{{asset('assets/front/js/owl-carousel.min.js')}}"></script>
    
    <!-- JQUERY MATCHHEIGHT JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" integrity="sha512-/bOVV1DV1AQXcypckRwsR9ThoCj7FqTV2/0Bm79bL3YSyLkVideFLE3MIZkq1u5t28ke1c0n31WYCOrO01dsUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JQUERY COUNTER JS -->
    <script src="{{asset('assets/front/js/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('assets/front/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/front/js/lightbox.min.js')}}"></script>
    <script src="{{asset('assets/front/css/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('assets/front/js/main.js')}}"></script>
    <script src="{{asset('assets/front/js/script.js')}}"></script>

    <script>
        lightbox.option({
           'disableScrolling': true
       })
   </script>

   {{-- Trekking Booking Price --}}
    <script>
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.addTrekkingBookingPrice').click(function () {
            var vendor_id = $(this).data('vendor_id');
            var quantity = $(this).prev().val();
            new_qty = parseInt(quantity)+1;
            $.ajax({
                url:'/trekking-booking-price',
			    type:'post',
			    data:{
                "_token": "{{ csrf_token() }}",
                "trekking_package_vendorid":vendor_id,"qty":new_qty},
			
			    success:function(response){
                    if(response.status=='trekking_price_successful'){
                        document.getElementById('trekking_total_price').innerHTML = response.data;
                        // document.getElementById('total_pricess').innerHTML = response.data;
                        $('#trekking_total_pricess').val(response.data);
				    }
			    }
                ,error:function(){
                    alert("Error");
                }
		    });


        if ($(this).prev().val() < 100) {
            $(this).prev().val(+$(this).prev().val() + 1);
            }
        });
        $('.subTrekkingBookingPrice').click(function () {

                if ($(this).next().val() > 1) {
                if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                var vendor_id = $(this).data('vendor_id');
                var quantity = $(this).next().val();
                // new_qty = parseInt(quantity)-1;
                console.log(quantity);
                $.ajax({
                url:'/trekking-booking-price',
			    type:'post',
			    data:{
                "_token": "{{ csrf_token() }}",
                "trekking_package_vendorid":vendor_id,"qty":quantity},
			
			    success:function(response){
                    if(response.status=='trekking_price_successful'){
                        document.getElementById('trekking_total_price').innerHTML = response.data;
                        // document.getElementById('total_pricess').innerHTML = response.data;
                        $('#trekking_total_pricess').val(response.data);
				    }
			    }
                ,error:function(){
                    alert("Error");
                }
		    });

                }
        });
    </script>

    {{-- Tour Booking Price --}}
    <script>
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
 
         $('.addTourBookingPrice').click(function () {
             var vendor_id = $(this).data('vendor_id');
             var quantity = $(this).prev().val();
             new_qty = parseInt(quantity)+1;
             $.ajax({
                 url:'/tour-booking-price',
                 type:'post',
                 data:{
                 "_token": "{{ csrf_token() }}",
                 "vendorid":vendor_id,"qty":new_qty},
             
                 success:function(response){
                     if(response.status=='successful'){
                         document.getElementById('total_price').innerHTML = response.data;
                         // document.getElementById('total_pricess').innerHTML = response.data;
                         $('#total_pricess').val(response.data);
                     }
                 }
                 ,error:function(){
                     alert("Error");
                 }
             });
 
 
         if ($(this).prev().val() < 100) {
             $(this).prev().val(+$(this).prev().val() + 1);
             }
         });
         $('.subTourBookingPrice').click(function () {
 
                 if ($(this).next().val() > 1) {
                 if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                 var vendor_id = $(this).data('vendor_id');
                 var quantity = $(this).next().val();
                 // new_qty = parseInt(quantity)-1;
                 console.log(quantity);
                 $.ajax({
                 url:'/tour-booking-price',
                 type:'post',
                 data:{
                 "_token": "{{ csrf_token() }}",
                 "vendorid":vendor_id,"qty":quantity},
             
                 success:function(response){
                     if(response.status=='successful'){
                         document.getElementById('total_price').innerHTML = response.data;
                         // document.getElementById('total_pricess').innerHTML = response.data;
                         $('#total_pricess').val(response.data);
                     }
                 }
                 ,error:function(){
                     alert("Error");
                 }
             });
 
                 }
         });
    </script>

    {{-- Adventure Booking Price --}}
    <script>
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
 
         $('.addAdventureBookingPrice').click(function () {
             var vendor_id = $(this).data('vendor_id');
             var quantity = $(this).prev().val();
             new_qty = parseInt(quantity)+1;
             $.ajax({
                 url:'/adventure-booking-price',
                 type:'post',
                 data:{
                 "_token": "{{ csrf_token() }}",
                 "vendorid":vendor_id,"qty":new_qty},
             
                 success:function(response){
                     if(response.status=='successful'){
                         document.getElementById('total_price').innerHTML = response.data;
                         // document.getElementById('total_pricess').innerHTML = response.data;
                         $('#total_pricess').val(response.data);
                     }
                 }
                 ,error:function(){
                     alert("Error");
                 }
             });
 
 
         if ($(this).prev().val() < 100) {
             $(this).prev().val(+$(this).prev().val() + 1);
             }
         });
         $('.subAdventureBookingPrice').click(function () {
 
                 if ($(this).next().val() > 1) {
                 if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                 var vendor_id = $(this).data('vendor_id');
                 var quantity = $(this).next().val();
                 // new_qty = parseInt(quantity)-1;
                 console.log(quantity);
                 $.ajax({
                 url:'/adventure-booking-price',
                 type:'post',
                 data:{
                 "_token": "{{ csrf_token() }}",
                 "vendorid":vendor_id,"qty":quantity},
             
                 success:function(response){
                     if(response.status=='successful'){
                         document.getElementById('total_price').innerHTML = response.data;
                         // document.getElementById('total_pricess').innerHTML = response.data;
                         $('#total_pricess').val(response.data);
                     }
                 }
                 ,error:function(){
                     alert("Error");
                 }
             });
 
                 }
         });
    </script>


    {{-- Helitour Booking Price --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.addHelitourBookingPrice').click(function () {
            var vendor_id = $(this).data('vendor_id');
            var quantity = $(this).prev().val();
            new_qty = parseInt(quantity)+1;
            $.ajax({
                url:'/helitour-booking-price',
                type:'post',
                data:{
                "_token": "{{ csrf_token() }}",
                "vendorid":vendor_id,"qty":new_qty},
            
                success:function(response){
                    if(response.status=='successful'){
                        document.getElementById('total_price').innerHTML = response.data;
                        // document.getElementById('total_pricess').innerHTML = response.data;
                        $('#total_pricess').val(response.data);
                    }
                }
                ,error:function(){
                    alert("Error");
                }
            });


        if ($(this).prev().val() < 100) {
            $(this).prev().val(+$(this).prev().val() + 1);
            }
        });
        $('.subHelitourBookingPrice').click(function () {

                if ($(this).next().val() > 1) {
                if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                var vendor_id = $(this).data('vendor_id');
                var quantity = $(this).next().val();
                // new_qty = parseInt(quantity)-1;
                console.log(quantity);
                $.ajax({
                url:'/helitour-booking-price',
                type:'post',
                data:{
                "_token": "{{ csrf_token() }}",
                "vendorid":vendor_id,"qty":quantity},
            
                success:function(response){
                    if(response.status=='successful'){
                        document.getElementById('total_price').innerHTML = response.data;
                        // document.getElementById('total_pricess').innerHTML = response.data;
                        $('#total_pricess').val(response.data);
                    }
                }
                ,error:function(){
                    alert("Error");
                }
            });

                }
        });
    </script>


    {{-- Nature Booking Price --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.addNatureBookingPrice').click(function () {
            var vendor_id = $(this).data('vendor_id');
            var quantity = $(this).prev().val();
            new_qty = parseInt(quantity)+1;
            $.ajax({
                url:'/nature-booking-price',
                type:'post',
                data:{
                "_token": "{{ csrf_token() }}",
                "vendorid":vendor_id,"qty":new_qty},
            
                success:function(response){
                    if(response.status=='successful'){
                        document.getElementById('total_price').innerHTML = response.data;
                        // document.getElementById('total_pricess').innerHTML = response.data;
                        $('#total_pricess').val(response.data);
                    }
                }
                ,error:function(){
                    alert("Error");
                }
            });


        if ($(this).prev().val() < 100) {
            $(this).prev().val(+$(this).prev().val() + 1);
            }
        });
        $('.subNatureBookingPrice').click(function () {

                if ($(this).next().val() > 1) {
                if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                var vendor_id = $(this).data('vendor_id');
                var quantity = $(this).next().val();
                // new_qty = parseInt(quantity)-1;
                console.log(quantity);
                $.ajax({
                url:'/nature-booking-price',
                type:'post',
                data:{
                "_token": "{{ csrf_token() }}",
                "vendorid":vendor_id,"qty":quantity},
            
                success:function(response){
                    if(response.status=='successful'){
                        document.getElementById('total_price').innerHTML = response.data;
                        // document.getElementById('total_pricess').innerHTML = response.data;
                        $('#total_pricess').val(response.data);
                    }
                }
                ,error:function(){
                    alert("Error");
                }
            });

                }
        });
    </script>

    <script>
        $('.add').click(function () {
        if ($(this).prev().val() < 100) {
            $(this).prev().val(+$(this).prev().val() + 1);
            }
        });
        $('.sub').click(function () {
                if ($(this).next().val() > 1) {
                if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                }
        });
    </script>
</body>
</html>