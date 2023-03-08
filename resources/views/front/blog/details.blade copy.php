@extends('front.layouts.app')
{{-- <title>{{$details->title}}-{{ $dashboard_settings->page_title }}</title> --}}


@section('content')
    
<!-- ===== MAIN ===== -->
<main class="bg-light toppadd main">
    <div class="mainpart pb-5">
        <div class="container">
            <div class="row position-relative">
                <article class="col-lg-9 pt-4 pb-lg-4 blog-inner">
                    <div class="bg-white border p-3">
                        {{-- <img width="880" height="448" src="https://northnepaltrek.com/wp-content/uploads/2021/04/Blue-Flat-Minimalist-Spa-Health-Website-880x448.png" class="img-fluid w-100 mb-3 wp-post-image" alt="Operational Guidelines Covid-19 Update (Sep-24) – North Nepal Travel" loading="lazy"> --}}
                        {{\Carbon\Carbon::parse($details->created_at)->format('d M, Y')}} - North Nepal Travels and Treks
                        <h1 class="blog-inner__title">
                            <a href="#">{{$details->title}}({{\Carbon\Carbon::parse($details->created_at)->format('Y')}} )</a>
                        </h1>
                        <p>
                            {!! $details->description !!}
                        </p>
                        
                        {{-- <h3 class="blog-inner__subtitle">Bookings with reassurance</h3>
                        <p>
                            <img loading="lazy" class="size-thumbnail wp-image-3875 alignleft" src="https://northnepaltrek.com/wp-content/uploads/2021/01/corona-travel-bw-150x150.png" alt="" width="150" height="150">
                            It is completely normal to change plans according to circumstances. More often than not, we all find ourselves in situations that were unforeseen. We understand that travel plans can also suffer the same fate and that is why we now provide more flexibility than ever to change your travel and trek plans. We assure you that <strong>you can rebook</strong> whenever the time is right for you as long as you notify about your changes at least <strong>7 days before</strong> the planned date. What’s more, there are no hidden charges and we will not demand a <strong>penny for any cancellations done</strong> before the mentioned time frame.
                        </p>
                        
                        <h3 class="blog-inner__subtitle">Prioritizing Safety and Responsible resumption of travel</h3>
                        <p>
                            <img loading="lazy" class="size-thumbnail wp-image-3877 alignleft" src="https://northnepaltrek.com/wp-content/uploads/2021/01/corona-image-bw-150x150.png" alt="" width="150" height="150">
                            After a brief hiatus, we have now resumed our travels and treks services while following the complete safety precautions. While we have always had health and safety policies, they have all now been updated in light of the Covid-19 pandemic. The standards are well in line with the safety precautions <strong>described by Nepal Government for Tourism Sector</strong>. The safety requirements are followed for not only our customers but our staff and members as well. In addition, we will have elaborate risk identification and analysis for all destinations before having our customers go on a trip. We advise you to refer to your government’s <strong>travel advisory</strong> about the permitted destinations and recommended safety precautions before visiting Nepal.
                        </p>
                        <h3 class="blog-inner__subtitle">Before you Fly&nbsp;</h3>
                        <ul>
                            <li>-Ve Covid test report within 72 hrs ideally with photo.</li>
                            <li>Travel insurance&nbsp;</li>
                            <li>Vaccination certificate&nbsp;</li>
                            <li>Hotel booking – (Fully vaccinated for initial days as per itinerary and Not fully vaccinated : 10 days)</li>
                            <li>CCMC online form ( <a href="https://ccmc.gov.np">www.ccmc.gov.np</a>)</li>
                        </ul>

                        <h3 class="blog-inner__subtitle">Start planning your life experience in Nepal !</h3>
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container">
                                <figure class="wp-block-table is-style-regular">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>
                                                        <span style="color:#2585af">
                                                            Fully Vaccinated
                                                        </span>
                                                    </strong> Contact Nepalese Embassy YES, granted at land or air            No Quarantine              <br>                                     or Consulate in your country                              <br><br><span style="color: #cf2e2e;"><strong>Not Vaccinated </strong> </span>      Contact Nepalese Embassy                  YES. But only with pre                    10 days Hotel <br>                                    or Consulate in your country                 recommendation from your              quarantine.<br>                                                                                                      travel agent in Nepal.</td></tr>
                                        </tbody>
                                    </table>
                                </figure>
                            </div>
                        </div>

                        <div class="wp-block-file">
                            <object class="wp-block-file__embed" data="https://northnepaltrek.com/wp-content/uploads/2021/09/Protocol-24th-Sept.pdf" type="application/pdf" style="width:100%;height:600px" aria-label="Embed of <span class=&quot;has-inline-color has-vivid-red-color&quot;>Tourist Visa Update 24 Sep 2021</span>.">
                            </object>
                            <a href="https://northnepaltrek.com/wp-content/uploads/2021/09/Protocol-24th-Sept.pdf">
                            <span style="color: #cf2e2e">
                                Tourist Visa Update 24 Sep 2021</span>
                            </a>
                            <a href="https://northnepaltrek.com/wp-content/uploads/2021/09/Protocol-24th-Sept.pdf" class="btn btn-submit" download="">Download</a>
                        </div>

                        <h3 class="blog-inner__subtitle">Essential Documents </h3>
                        <ul>
                            <li>Vaccinated certificate </li>
                            <li>Hotel booking evidence </li>
                            <li>Recommendation letter (if you are not vaccinated – obtain Visa on Arrival recommendation letter  through travel agency in Nepal)</li>
                            <li>CCMC form</li>
                        </ul> --}}

                        <div class="w-100 text-center">
                            <h6 class="addtoany_heading">Share this:</h6>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div>
                            {{-- <div class="addtoany_shortcode">
                                <div class="addtoany_list">
                                    <a href="#">
                                        <i class="fa fa-facebook addtoany_list__facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-pinterest addtoany_list__pinterest"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-envelope addtoany_list__envelope"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-whatsapp addtoany_list__whatsapp"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-twitter addtoany_list__twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-comment addtoany_list__messenger"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-plus addtoany_list__plus"></i>
                                    </a>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </article>

                <aside class="py-5 col-lg-3 mx-auto"">
                    <div id="sidebar" class="stickthis sidebar">
                        {{-- <div class="mb-4 bg-white shadow-sm">
                            <h4 class="p-3 mb-0 text-white bg-heading">Activities</h4>
                            <div class="p-3">
                                <ul id="menu-sidebar-menu" class="mb-0 list-unstyled side-links">
                                    <li class="menu-item">
                                        <a href="#">Trekking and Hiking</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Adventure Activities</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Tours</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Nature and Wildlife</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Latest Blog</a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}

                        <div class="mb-4 bg-white shadow-sm">
                            <h4 class="p-3 mb-0 text-white bg-heading">Any Questions?</h4>
                            <div class="p-3">
                                @if(session('message'))
                                    <div class="alert alert-info alert-dismissible" id="successMessage">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{session('message')}}
                                    </div>
                                @endif
                                <form method="post" action="{{route('blogEnquirySave')}}" class="sidebar-form">
                                    @csrf
                                    <input type="hidden" name="type" value="enquiry">

                                    <div class="row">
                                        <div class="col-md-6 col-lg-12 form-group">
                                            <span class="form-group-wrap">
                                                <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your Name*" required="required">
                                            </span>
                                        </div>
                                        <div class="col-md-6 col-lg-12 form-group">
                                            <span class="form-group-wrap">
                                                <input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Email Address*" required="required">
                                            </span>
                                        </div>
                                        <div class="col-md-6 col-lg-12 form-group">
                                            <span class="form-group-wrap">
                                                <input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your Subject*" required="required">
                                            </span>
                                        </div>
                                        <div class="col-md-6 col-lg-12 form-group">
                                            <span class="form-group-wrap">
                                                <textarea name="message" cols="40" rows="7" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Message"></textarea>
                                            </span>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit btn btn-submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
<!-- ===== EMD MAIN ===== -->

<!-- ===== FOLOW US ===== -->
<section class="py-3 bg-light socialbox border-top">
    <div class="container">
        <ul class="mb-0 row list-unstyled">
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-facebook"></i>
                </span>
                <a href="{{$dashboard_settings->facebook}}" class="align-middle d-table-cell">
                <p>Find us on Facebook</p>
                </a>
            </li>
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-instagram"></i>
                </span>
                <a href="{{$dashboard_settings->instagram}}" class="align-middle d-table-cell">
                <p>Follow us on Instagram</p>
                </a>
            </li>
             <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-pinterest"></i>
                </span>
                <a href="{{$dashboard_settings->pinterest}}" class="align-middle d-table-cell">
                <p>
                    Follow us on Pinterest
                    </p>
                </a>
            </li>
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-twitter"></i>
                </span>
                <a href="{{$dashboard_settings->twitter}}" class="align-middle d-table-cell">
                <p>
                    Follow us on Twitter
                    </p>
                </a>
            </li>
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-youtube"></i>
                </span>
                <a href="{{$dashboard_settings->youtub}}" class="align-middle d-table-cell">
                <p>
                    Watch us on YouTube
                    </p>
                </a>
            </li>
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-tripadvisor"></i>
                </span>
                <a href="{{$dashboard_settings->tripadvisor__link}}" class="align-middle d-table-cell">
                <p>
                    Find us on TripAdvisor
                    </p>
                </a>
            </li>
        </ul>
    </div>
</section>
<!-- ===== END FOLOW US ===== -->


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61a0746918b915c7"></script>

@endsection
