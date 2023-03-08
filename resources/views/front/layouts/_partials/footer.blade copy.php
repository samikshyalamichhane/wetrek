    <!-- ========== Accredit Dynamic ========== -->
    <div id="myModal" class="modal fade popupbox" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3>Thank You !!!</h3>
                    <h5>You have successfully subscribed to our News Letter.</h5>
                </div>
                <div class="modal-footer contact-us">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @if (isset($dashboard_associates[0]))
        <section class="accreditation acc noacc">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12 mb-md-0 mb-4">
                        <div class="section-title acc-title text-center">
                            <h1>Accreditations</h1>
                        </div>
                         <div class="accrow">
                        <div class="row">
                            @foreach ($dashboard_associates as $associate)
                            <div class="col-md-2 col-3">
                                <div class="card border-0">
                                    <a href="{{$associate->link}}"><img src="{{asset('images/main/'.$associate->image)}}" alt="" class="card-img img-fluid"></a>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="col-md-2 col-12">
                                <div class="card border-0">
                                    <img src="{{asset('assets/front/img/logos-2.png')}}" alt="" class="card-img img-fluid">
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="card border-0">
                                    <img src="{{asset('assets/front/img/logos-3.png')}}" alt="" class="card-img img-fluid">
                                </div>
                            </div> --}}
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="accreditation acc">
            <div class="container">
                <div class="row no-gutters">

                    <div class="col-12">
                        <div class="newsletter">
                            <div class="section-title acc-title text-center">
                                <h1>Newsletter</h1>
                                {!! $dashboard_settings->newslatter_description !!}
                            </div>
                            {{-- alert message --}}
                            <!-- @if(session('message1'))
                                <div class="alert alert-info alert-dismissible" id="successMessage">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{session('message1')}}
                                </div>
                            @endif -->
                            <form action="{{route('saveSubscribers')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 mx-auto">
                                        <div class="row form-group">
                                            <input type="text" name="first_name" placeholder="First Name" class="form-input-box form-control" id="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mx-auto">
                                        <div class="row form-group">
                                            <input type="text" name="last_name" placeholder="Last Name" class="form-input-box form-control" id="last_name">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mx-auto">
                                        <div class="row form-group">
                                            <input type="text" name="email" placeholder="Email id" class="form-input-box form-control" id="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mx-auto">
                                        <button type="submit" class="btn primary-btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- ========== End of Accredit ========== -->


    <!-- ========== Footer ========== -->
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="single-footer-widget">
                            <h6>Company</h6>
                            <ul>
                                <li><a href="{{ route('whoweare') }}">Who we are</a></li>
                                <li><a href="{{ route('whyus') }}">Why Travel With Us</a></li>
                                <li><a href="{{ route('team') }}">Our Team</a></li>
                                <li><a href="{{route('resolvepath.show', 'privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('resolvepath.show', 'travel-terms-bookings')}}">Travel Terms & Conditions</a></li>
                                <li><a href="{{route('blogList')}}">Travel Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="single-footer-widget">
                            <h6>Travel Guide</h6>
                            <ul>
                                @foreach ($dashboard_pages->where('travel_guide',1) as $page)
                                    <li><a href="{{route('resolvepath.show',$page->slug)}}">{{ $page->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="single-footer-widget">
                            <h6>Trekking By Region</h6>
                            <ul>
                                @foreach($dashboard_regions as $region)
                                <li><a href="{{ route('resolvepath.show', $region->slug) }}">{{ $region->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 col-6 poo">
                        <div class="single-footer-widget">
                            <h6>Contact Us</h6>
                            <ul>
                                <li><a href="#">{{$dashboard_settings->site_name}}</a></li>
                                <li><a href="#"><i class="fa fa-map-marker mr-2"></i>{{$dashboard_settings->address}}</a></li>
                                <li><a href="#" class="single-line"><i class="fa fa-envelope mr-2"></i>{{$dashboard_settings->email}}</a></li>
                                <li><a href="#"><i class="fa fa-mobile mr-2"></i>Mobile:- {{$dashboard_settings->telephone}}</a></li>
                                <li><a href="#"><i class="fa fa-whatsapp mr-2" aria-hidden="true"></i>WhatsApp/ Viber:- {{$dashboard_settings->whatsapp}} </a></li>
                            </ul>
                        </div>
                    </div> -->
                    @foreach($footer_dest->destinationtype as $dest)
                    @if($dest->slug == 'helicopter-tour-in-nepal')
                    <div class="col-md-3 col-6 poo">
                        <div class="single-footer-widget">
                            <h6>{{$dest->title }}</h6>
                            <ul>
                                @foreach($dest->packages as $package)
                                <li><a href="{{route('resolvepath.show',[$package->slug])}}">{{$package->package_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="container">
                <h4>Contact Us</h4>
                <div class="row">
                    
                    <div class="col-md-3 hoi">
                     <img src="{{asset('assets/front/img/chet bhatta.jpg')}}" alt="" class="card-img img-fluid">   
                    </div>
                    <div class="col-md-3">
                        <div class="fmleft">
                            <h6><b>Nepal <span>Office</span></b></h6>
                            <ul>
                            <li>Chet Prasad Bhatta</li>
                            <li>Managing Director</li>
                            <li>(22 Years in Adventure Travel in Nepal)</li>
                            <li>Mobile/ Viber/WhatsApp/ WeChat:<br> +977 9851040806</li>
                            
                            <li>Budhanilkantha-03, Kathmandu,Nepal</li>
                            <li><a href="#">info@classicvacationsnepal.com</a></li>
                           
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-3">
                     <img src="{{asset('assets/front/img/ram dai.jpeg')}}" alt="" class="card-img img-fluid">   
                    </div>
                    
                    <div class="col-md-3 pull-right">
                        <div class="fmleft">
                            <h6><b>Usa <span>Office</span></b></h6>
                            <ul>
                            <li>Ram Pathak</li>
                            <li>Marketing Director- USA & Canada</li>
                            
                            <!--<li>Cell Number/ WhatsApp:<br> +1 402 218 3027</li>-->
                            <li>Columbus, Ohio, USA</li>
                            
                            <li><a href="#">sales@classicvacationsnepal.com</a></li>
                           
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center logo-text">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-3">
                        @if (isset($dashboard_settings->logo))
                        <!--<a href="/"><img src="{{asset('images/main/'.$dashboard_settings->logo)}}" alt="" title="" /></a>-->
                        <a href="/"><img src="https://classicvacationsnepal.com/assets/front/img/clv.png" alt="" title="" /></a>
                        @else
                        <!--<a href="/"><img src="{{asset('assets/front/img/logo.png')}}" alt="" title="" /></a>-->
                        <a href="/"><img src="https://classicvacationsnepal.com/assets/front/img/clv.png" alt="" title="" /></a>
                        @endif
                        </div>
                        <div class="col-md-9 footerborder">
                        <p class="ft">{!! $dashboard_settings->description !!}</p>
                        <p class="cr">Copyright &copy; Classic Vacations Nepal-2022</p>
                    </div>
                    </div>
                    </div>


                    <div class="col-md-5 pao">
                        <div class="d-flex social">
                            <a target="_blank" href="{{$dashboard_settings->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="{{$dashboard_settings->twitter}}"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="{{$dashboard_settings->instagram}}"><i class="fa fa-instagram"></i></a>

                        </div>
                         <div class="footer-logo flogo">
                            <p class="text-right">Developed By:<a href="https://webhousenepal.com/"><img src="{{asset('assets/front/img/logo.svg')}}" alt="" target="blank" rel="nofollow"></a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="footer-btm">-->
        <!--    <div class="container">-->
        <!--        <div class="row align-items-center logo-text">-->
        <!--            <div class="col-md-7 usaa">-->
                      
        <!--            </div>-->



        <!--            <div class="col-md-5 pao">-->

                       
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </footer>
    

    <!--@stack('scripts')-->
    <!-- ========== End of Footer ========== -->

    <!-- {{asset('assets/front/    ')}} -->
    <!-- JS -->
    <script src="{{asset('assets/front/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/front/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/front/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/front/js/superfish.min.js')}}"></script>
    <script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/front/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/front/js/main.js')}}"></script>
    </section>
    @stack('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
        @if(Session::has('message1'))
            $('#myModal').modal('show');
        @endif
    });
</script>
<!-- <script>
$(document).ready(function(){
$('#Mybtn').click(function(){
$('#MyForm').toggle(500);
});
});
</script>
<script>
$(document).ready(function(){
$('#Mybtn1').click(function(){
$('#MyForm').toggle(1000);
});
});
</script> -->

</body>

</html>