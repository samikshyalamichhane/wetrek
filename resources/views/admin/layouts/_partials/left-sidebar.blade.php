<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ $dashboard_settings->logoUrl() ? $dashboard_settings->logoUrl()  : asset('assets/front/img/wetravel-logo.png') }}" class="rounded" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div>
            </div>
        </div>
        <ul class="side-menu metismenu">

            <li class="heading">Menu</li>
            <li>
                <a href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-dashboard"></i>
                <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="{{route('setting')}}"><i class="sidebar-item-icon fa fa-wrench"></i>
                <span class="nav-label">Site Setting</span></a>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-crosshairs"></i>
                    <span class="nav-label">Destination</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('destination.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Destination
                        </a>
                    </li>
                    <li>
                        <a href="{{route('destination.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Destinations
                        </a>
                    </li>
                </ul>

                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('destinationtype.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Destination Type
                        </a>
                    </li>
                    <li>
                        <a href="{{route('destinationtype.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Destinations Type
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-paper-plane"></i>
                    <span class="nav-label">Our Package</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <!-- <li>
                        <a href="{{route('region.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Category
                        </a>
                    </li> -->
                    <li>
                        <a href="{{route('category.index')}}">
                            <span class="fa fa-plus"></span>
                            Category List
                        </a>
                    </li>
                </ul>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('region.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Region
                        </a>
                    </li>
                    <li>
                        <a href="{{route('region.index')}}">
                            <span class="fa fa-plus"></span>
                            Region List
                        </a>
                    </li>
                </ul>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('package.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Package
                        </a>
                    </li>
                    <li>
                        <a href="{{route('package.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Packages
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-paper-plane-o"></i>
                    <span class="nav-label">Why Choose US</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('whywithus.create')}}">
                            <span class="fa fa-plus"></span>
                            Add
                        </a>
                    </li>
                    <li>
                        <a href="{{route('whywithus.index')}}">
                            <span class="fa fa-circle-o"></span>
                            List
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-pagelines"></i>
                    <span class="nav-label">Pages</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('pages.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Pages
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pages.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Pages
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-pagelines"></i>
                    <span class="nav-label">Gallery</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('gallery.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Gallery
                        </a>
                    </li>
                    <li>
                        <a href="{{route('gallery.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Galleries
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-book"></i>
                    <span class="nav-label">Blogs</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('blog.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{route('blog.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Blogs
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-handshake-o"></i>
                    <span class="nav-label">Associated With
                    </span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('associate.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Associations
                        </a>
                    </li>
                    <li>
                        <a href="{{route('associate.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Associations
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Team</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('team.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Team
                        </a>
                    </li>
                    <li>
                        <a href="{{route('team.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Team
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-book"></i>
                    <span class="nav-label">Booking Info</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>

                <ul class="nav-2-level collapse">
                    
                    <li>
                        <a href="{{route('bookingLists')}}">
                            <span class="fa fa-plus"></span>
                             Booking Lists
                        </a>
                    </li>
                    <li>
                        <a href="{{route('quoteLists')}}">
                            <span class="fa fa-plus"></span>
                            Request Quote Lists
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{route('tourbookings.index')}}">
                            <span class="fa fa-plus"></span>
                            Tour Package Booking
                        </a>
                    </li>
                    <li>
                        <a href="{{route('adventurebookings.index')}}">
                            <span class="fa fa-plus"></span>
                            Adventure Package Booking
                        </a>
                    </li>
                    <li>
                        <a href="{{route('helitourbookings.index')}}">
                            <span class="fa fa-plus"></span>
                            Heli Tour Package Booking
                        </a>
                    </li>
                    <li>
                        <a href="{{route('naturebookings.index')}}">
                            <span class="fa fa-plus"></span>
                            Nature Package Booking
                        </a>
                    </li> --}}

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sliders"></i>
                    <span class="nav-label">Slider</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('slider.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Slider
                        </a>
                    </li>
                    <li>
                        <a href="{{route('slider.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Slider
                        </a>
                    </li>

                </ul>
            </li>

            {{-- <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">History in Service
                    </span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('history.create')}}">
                            <span class="fa fa-plus"></span>
                            Add History
                        </a>
                    </li>
                    <li>
                        <a href="{{route('history.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All History
                        </a>
                    </li>

                </ul>
            </li> --}}


             <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Testimonial</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('testimonial.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Testimonial
                        </a>
                    </li>
                    <li>
                        <a href="{{route('testimonial.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Testimonial
                        </a>
                    </li>

                </ul>
            </li> 

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-star-half-full"></i>
                    <span class="nav-label">Travelers Review</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('travelersreview.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Travelers Review
                        </a>
                    </li>
                    <li>
                        <a href="{{route('travelersreview.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Travelers Review
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    {{-- <i class="sidebar-item-icon fa fa-sitemap"></i> --}}
                    <i class='sidebar-item-icon fa fa-address-card'></i>


                    <span class="nav-label">Package Inquiry List</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('packageEnquiryList')}}">
                            <span class="fa fa-plus"></span>
                            Inquiry List
                        </a>
                    </li>

                </ul>
            </li>


            {{-- //CV --}}
            <li>
                <a href="javascript:;">
                    {{-- <i class="sidebar-item-icon fa fa-sitemap"></i> --}}
                    <i class='sidebar-item-icon fa fa-address-card'></i>


                    <span class="nav-label">Newsletters</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('subscriberList')}}">
                            <span class="fa fa-plus"></span>
                            Subscriber List
                        </a>
                    </li>

                </ul>
            </li>

            {{-- <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Video</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('video.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Video
                        </a>
                    </li>
                    <li>
                        <a href="{{route('video.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Video
                        </a>
                    </li>

                </ul>
            </li> --}}
            <!-- <li>
               <a href="#">
                    <i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Users Management</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
            </li>
            <li>
               <a href="">
                    <i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Site Management</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
            </li> -->

            @if(Auth::user()->type=="superadmin" || Auth::user()->type=="admin")
            <li>
                <a href="{{route('admins-subadmins')}}"><i class="sidebar-item-icon fa fa-user"></i>
                <span class="nav-label">Add Users</span></a>
            </li>
            @endif

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Message ContactUs</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('enquiryList')}}">
                            <span class="fa fa-plus"></span>
                            ContactUs Message
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{route('subscriberList')}}">
                            <span class="fa fa-plus"></span>
                            Subscriber List
                        </a>
                    </li> --}}

                </ul>
            </li>


        </ul>
    </div>
</nav>
