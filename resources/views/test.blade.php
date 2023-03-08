<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;1,300;1,400&family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="{{asset('assets/front/css/owl-carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/lightbox.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/main.css')}}">

    <title>Document</title>
</head>
<body>
    <div id="nav-package">
        <?php include "partials/header.php" ?>
    </div>

    <div style="clear:both;"></div>


    <!-- ========== Inner Package ========== -->
    <main>
        <section class="hero-image">
            <div class="hero-image__frame gradient-overlay" style="background-image: url('https://www.discoveryworldtrekking.com/media/2085/everest-base-camp.gif');">
                <div class="container">
                    <h1 class="inner-hero-title"> Everest Base Camp Trek -14 Days </h1>
                </div>
            </div>
        </section>

        <section class="detail-section">
            <div class="container">
                <div class="row main" id="main-content">
                    <div id="content" class="trip-detail trip-detail--alt col-lg-8 col-12">
                        <!-- TRIP DETAIL SHARE -->
                        <div class="trip-detail__share">
                            <div class="social-share">
                                <span class="social-share__title">Share with your Friends</span>
                                <ul class="share-list">
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <!-- END TRIP DETAIL SHARE -->

                        <!-- TRIP DETAIL TABLE -->
                        <div class="row trip-detail__table">
                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-location2"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Destination</h6>
                                        <h6 class="trip-detail__table--subtitle">Nepal</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-travel-walk"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Activity</h6>
                                        <h6 class="trip-detail__table--subtitle">Everest Treks</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <img src="images/icon-tent.svg" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Accomodation</h6>
                                        <h6 class="trip-detail__table--subtitle">Hotel/Lodge/Tea House during the trek</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-map"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Region</h6>
                                        <h6 class="trip-detail__table--subtitle">Everest Region</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                    <img src="images/icon-distance.svg" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Distance</h6>
                                        <h6 class="trip-detail__table--subtitle">lukla-EBC-Lukla(130km/80miles)</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-direction"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Start / End Point</h6>
                                        <h6 class="trip-detail__table--subtitle">Kathmandu/ Kathmandu</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-calendar"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Duration</h6>
                                        <h6 class="trip-detail__table--subtitle">14 Days</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                    <img src="images/icon-travel.svg" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Max. Altitude</h6>
                                        <h6 class="trip-detail__table--subtitle">5,555M at Kalapatthar</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-spoon-knife"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Meals Included</h6>
                                        <h6 class="trip-detail__table--subtitle">All Meals (Breakfast, Lunch & Dinner) during the trek</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                <img src="images/icon-group.svg" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Group Size</h6>
                                        <h6 class="trip-detail__table--subtitle">2-30</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                <img src="images/icon-nature.svg" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Nature of Trek</h6>
                                        <h6 class="trip-detail__table--subtitle">Lodge to Lodge Trekking</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-icloud"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Best Season</h6>
                                        <h6 class="trip-detail__table--subtitle">Feb, Mar, Apr, May, une, Sept, Oct, Nov & Dec</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-qrcode"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Trip Code</h6>
                                        <h6 class="trip-detail__table--subtitle">DWTTK01</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-directions_run"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Activity Per Day</h6>
                                        <h6 class="trip-detail__table--subtitle">Approximately 4-6 hrs walking</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-bus"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Transporation</h6>
                                        <h6 class="trip-detail__table--subtitle">Domestic Flight (KTM-Lukla-KTM) and private vehicle</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="b-2 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="images/sprite.svg#icon-speedometer"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Grade</h6>
                                        <h6 class="trip-detail__table--subtitle">Challenging</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TRIP DETAIL TABLE -->

                        <!-- TRIP DETAILS -->
                        <div class="trip-detail__card">
                            <h2 class="trip-detail__card--title">Mount Everest Base Camp Hike Overview</h2>
                            <p>Everest Base Camp Trek in Nepal sits on the lap of Mt Everest, over the 29,029 ft/ 8,848.68m elevation (The World's Highest Peak), The mighty Mt Everest soars high against a background of the vast deep blue sky like nature in heaven, and in its lap, "Everest Base Camp" (5,364m/17,598ft) thrives with breathtaking landscapes and snow-capped peaks around an adventurous journey full of thrills &amp; eye-catching landscapes where you will be a part of majestic Himalayan ranges, Buddhist monasteries, Sherpa culture, and wildlife. Our experience has dialed in every detail of the trek; providing overall perspectives and supportive tips throughout the journey towards EBC &amp; Kalla Patthar at an elevation of 5,545 m /18,192 ft). The classic EBC Trek journey begins and ends in our capital city Kathmandu. Discover the small villages dotted with fluttering prayer flags and have a closer picture of colorful Buddhist and Hindu traditions and culture.</p>
                            
                            <div class="highlight-list">
                                <div class="sub-title">
                                    <svg class="search-icon">
                                        <use xlink:href="images/sprite.svg#icon-badge"></use>
                                    </svg>
                                    <span>EBC Trek Highlights</span>
                                </div>
                                <ul class="list list--hand-bullet">
                                    <li>World’s highest airport in Syangboche</li>
                                    <li>Explore the culture and lifestyles of the local Sherpa people</li>
                                    <li>The exquisiteness of the world’s highest peak, Mt. Everest 8,848.68m/29,029 ft.</li>
                                    <li>View of other peaks such as Mt. Lhotse(8,516m), Cho Oyu(8,201m) and Mt.Makalu (8,463m)</li>
                                    <li>Explore UNESCO World Heritage Sites</li>
                                    <li>Prayer wheels, colourful flags, Mani stones, high suspension bridges</li>
                                    <li>The wide range of Flora and Fauna</li>
                                    <li>Ancient monastery in Tengboche</li>
                                    <li>Wildlife like musk deer, colourful pheasants, snow leopard and Himalayan Thar</li>
                                    <li>Highest glacier on Earth- Khumbu Glacier (4,900 m)</li> <li>Amazing panoramic view from Kala Patthar (5,555m)</li>
                                </ul>
                            </div>
                            
                            <h3 class="highlight-list__title">Perks of EBC Tour with Discovery World Trekking</h3>
                            <ul class="list list--hand-bullet"><li><strong>Pick up &nbsp;&amp; drop off</strong> from airport to hotel and vice versa in <strong>private Vehicle &nbsp;</strong></li><li>Provide pulse <strong>oximeter for the blood oxygen saturation level</strong> monitor to high altitude. It is an important indicator to recognize early signs of impending altitude sickness and other potential health risks.</li><li><strong>Medical Kit</strong>.</li><li>The arrangement of sleeping bags and down jackets if you do not have your own.</li><li><strong>Duffle bag &nbsp;</strong>for porters</li></ul>
                            
                        </div>

                        <div class="trip-detail__card" id="overview">
                            <div class="highlight-list">
                                <div class="sub-title">
                                    <svg class="search-icon">
                                        <use xlink:href="images/sprite.svg#icon-search"></use>
                                    </svg>
                                    <span>Comprehensive Everest Base Camp Tour Guide</span>
                                </div>
                                <p><span style="font-weight: 400;">We welcome you to join this adventure to reach your ultimate destination for a lifetime experience in the Himalayas of Nepal. <strong>Visit Everest Base Camp</strong>, heaven on earth. Nothing beats the thrill of seeing the elegance of mighty mountains up close. A journey that starts and ends with an awe-inspiring 45 minutes flight from Kathmandu to Lukla and vice versa, we will reach the starting hub of "<strong>Everest base Camp Expedition</strong>"- </span><strong>Lukla(2,840m/9,317 ft)</strong><span style="font-weight: 400;">. <br><br>Gearing up to walk towards </span><strong>Phakding (2,610 m/ 8,562 ft)</strong><span style="font-weight: 400;"> through the Sherpa village(the entire Khumbu region is inhabited by Sherpa Community), farmland will be our first move there.&nbsp;</span><span style="font-weight: 400;">Although our destination on that particular day would be Phakding, we’ll cross lots of villages and suspension bridges along the way. The views will be spectacular and depending upon the season, we’ll unlock many majestic views of the Himalayas which are technically the tip of the iceberg considering your final destination would be Everest Base Camp and Kalapatthar. </span><span style="font-weight: 400;">The notable places between Lukla and Phakding are <strong>Chaurikharka, Chheplung, Nachipang, Koshigaun,</strong> and last but not least <strong>Ghat</strong>, Most of the villages mentioned here are <strong>higher than 2,500 m/8,202 ft above sea level</strong> and goes along with <strong>Dudh Koshi River</strong>, we’ll cross almost 4/5 Suspension bridge on this very itinerary making the 1st days an exciting one.&nbsp; </span><span style="font-weight: 400;">The next day would be quite exciting as we’ll check in to Sagarmatha National park, again cross long suspension bridges, Have a glance at the Lowest possible Everest Viewpoint, walk around <strong>Thaktul Monastery (2,860 me/9,383 ft)</strong> and so many things. About 98% of the total houses around this area are used for local Restaurants and lodges, so one will already feel excited about the journey as we'll see so many locals and tourists having their own walk of life while we do our own. The popular stops between Phakding and <strong>Namche Bazar (3,440 m/11,286 ft)</strong> would be <strong>Tok Tok, Benkar, Jorsalle,</strong> and <strong>Monjo</strong>. All these villages have huge stones carved in Buddist language(which is <strong>actually called Mane &amp; Chortens in the native Sherpa language</strong> which is there for good luck and well wishes for locals and travelers: it is said that one should always choose to walk the <strong>clockwise direction for good charm while crossing those carved stones</strong> as per traditional beliefs), thousands of <strong>prayer flags, Huge Prayer wheels (Rotating bells),</strong> and the <strong>chilling cold breeze</strong> of the river which just flows right by our trekking trails. It’s really exciting to see the increase in height of the suspension bridges the more we go towards our destination. </span><span style="font-weight: 400;">There’s a place where we’ll see two suspension bridges hanging between the same Hill station, one after another which looks straight out of Sci-fi movies but it’s surreal as you can hear the current of the river flowing down there. we’ll also pass the incredible <strong>Hillary suspension bridge</strong> on our way to Namche Bazar where people tie prayer flags &amp; Khata <strong>(a yellowish piece of cloth used in important events ). </strong></span><span style="font-weight: 400;">After a steep uphill trek to Namche Bazar in the dense green pine forest, which is quite a <strong>leap from 2,600 m/8,530 ft</strong>. so we’ll acclimatize one day at Namche Bazar and viewpoints around there. While acclimatizing, we’ll also visit places like the <strong>Sherpa museum</strong> (Which is run by a local photographer Sonam) where we’ll see traditional Sherpa Households, Art galleries and get a glance at the Sherpa lifestyle throughout history. We’ll also Visit fantastic places like <strong>the Highest altitude Airport</strong> (<strong>Syangboche Airport</strong>) Constructed in the History of Nepal (It’s closed for almost a decade now but the views are still amazing), <strong>Hillary School</strong>, <strong>Yak farm</strong>, <strong>Hotel Everest View</strong> (as they quote “</span><strong><em>Opened in 1971, Hotel Everest View has been listed on the Guinness Book of World Records (2004) as the Highest Placed Hotel in the world at 13,000ft.</em></strong><span style="font-weight: 400;">”) and The Famous <strong>Khumjung Monastery</strong> consists of the Extinct Yeti Scalp which is not something that one can find in any part of the world. </span><span style="font-weight: 400;">Up next we’ve “<strong>Tengboche</strong>”, yet another gem of the Khumbu region - a place where the famous <strong>Tengboche monastery 3,867 meters/12,687 ft,</strong> with Panoramic views of the Himalayas.&nbsp;</span><span style="font-weight: 400;">Tengboche monastery is also known for its calm and quiet environment as it’s a holy place for meditation and prayers. It’s also known as <strong>“Incense Monastery”</strong> where all one can hear is the echo of air struck into the Himalayas and sounds of birds and animals of that region. (especially the Danfe(Himalayan monal) and many kinds of musk deer). <br><br></span><span style="font-weight: 400;">The route from Tengboche to <strong>Dingboche at an elevation of 4,410 meters/14,470 ft</strong>, is such an enchanting place to be where we'll face the entire ranges of the Himalayas in the Khumbu region. We’re sure one will literally fall in love with the spectacular creation of nature. To paint a rough picture, we’ll encounter peaks such as <strong>Lhotse</strong> (</span><span style="font-weight: 400;"> 8,516 m/27,940 ft)</span><span style="font-weight: 400;">, <strong>Nuptse</strong> (7,861 m/25,791 ft), <strong>Makalu</strong> (8,485 meters/27,838 ft), <strong>Cho Oyu</strong> (26,867 feet/8,189 m)), <strong>Ama Dablam</strong> (6,812 m/22,349 ft), <strong>Thamserku</strong> 6,608 m /21,680 ft, <strong>Island Peak</strong> (6,189 m/20,305 ft), <strong>Mera Peak</strong> (6,476 m/21,247 ft), <strong>Lobuche</strong> (4,940 meters/16,210 ft), and many more making it worth as much as 7 summits experience. </span><span style="font-weight: 400;">Along your way, we’ll find many stupas which are actually called “<strong>Baudha</strong>'' in the Buddhist language and the most renowned “<strong>Pangboche Monastery</strong>” which was built in the <strong>16th Century</strong> making one of the oldest monasteries of modern history. Like all other monasteries, pictures are not allowed in the Pangboche monastery. We can still see the <strong>claws and skull of Yeti</strong> which are said to be the loyal pet of ancient monks who lived in the Himalayas of those regions.&nbsp;</span><span style="font-weight: 400;">Again back to our itinerary route, from Tengboche, we’ll go along the villages like <strong>Deboche</strong> which again is a beautiful village with frozen river streams directly from mountains and a magical view of sunrise and sunset of Mt Ama Dablam, and from Deboche we’ll head to Dingboche where will give rest to our legs and again acclimatize in Dingboche. Although, we’re set this day for acclimatization, we’ll still visit the Imja Lake and river which flows east to the village and see all those glittery colorful skies in the night and amazing mountain peaks which we mentioned earlier. It’s quite unusual that despite having <strong>ChhuKung Ri (5,550 m /18,209 ft), Imja Lake (5,004 m/16,417 ft),</strong> Way to Island peak; yet Dingboche is a warm place like some kind of Miracle. No wonder it’s one of the wonders of nature. After a joyful acclamation and a little tour around, we’ll be ready to head towards Lobuche. </span><span style="font-weight: 400;">To make the trip even more interesting and have the taste of more pies around the Khumbu region we’ll accent via Thukla Pass, We’ll also see the memorial park right above the Thukla pass, an entire hill covered with Mane and stones with a Tribute to late Legends of mountains who came in Khumbu region from all corners of the world to conquer their dreams representing their Home Flags, and these are the points surrounded by mountains and just mountains. <strong>Lobuche, at an elevation of about 4,940 m/ 16,210 ft,</strong> is approximately 8.5 km SW of Everest Base Camp giving a rare view of Mt Everest. </span><span style="font-weight: 400;">After a chilling night at Lobuche, the final lodging place of the entire Khumbu Region: Gorakshep. Yeah, you heard that right, few hours before the true <strong>Everest Base Camp elevation (5,364 meters/17,598 ft)</strong> &amp; Famous Kalapatthar, <strong>Gorak Sheep (at 5,164 m/16,942 ft)</strong> just by <strong>Khumbu Glacier</strong>; is one of the largest glaciers of the world-Khumbu) is the final stop where lodges &amp; Restaurants end where’ll decent while leaving our footprint on "Everest Base Camp and <strong>Kalapatthar"</strong>(Especially to see the exquisite sunrise &amp; Sunset at <strong>5,550m/18,209ft</strong> set of Mt Everest and also the up-close view of the entire peak ).</span><span style="font-weight: 400;"><br></span><span style="font-weight: 400;"><br></span><span style="font-weight: 400;"> It’ll definitely be one of those magical moments where you’ll have tears in your eyes and a sense of achievement that will encourage you your entire life. No words or pictures can describe the bliss you get while discovering yourself around the holy mountains with a blend of Nepalese Buddhist Culture. That's why it is one of the most popular treks in the world). Everest Trek In Nepal is an adventurous trek package that is preferred by the majority of trekkers coming to Nepal. After a successful trek to EBC (Many like to take their flag and wave on the Everest base camp), yet another magical picturesque valley of mountains where a pure Khumbu glacier water flows await us (<strong>Pheriche at an elevation of 4,371 m/14,340 ft).</strong>&nbsp; Interestingly, if you haven’t already seen, we’ll also see how turbines are used for generating electricity up in those altitudes. After a cozy night in Himalayan Valley, we’ll descend via Samore Village which is just half an hour away from<strong> Pangboche (13,074 ft/3,985 m)</strong>. At this point, you would already recognize the route and village from where we began. We’ll follow the route of <strong>Tengboche</strong> heading down to <strong>Namche Bazar</strong>,<strong> Monjo, Phakding</strong>, and finally to <strong>Lukla</strong> where we’ll take a flight back to <strong>Kathmandu, the final hours of our Everest Base Camp package.&nbsp; </strong>Take part in the Everest base camp tour package from Kathmandu with <strong>Discovery World Trekking.</strong></span></p>
                            
                                <div class="highlight-card">
                                    <p>
                                        Discovery World Trekking would like to recommend all our valuable clients that they should arrive in Kathmandu a day earlier in the afternoon before the day we departed and start our Everest Base Camp Trek the next day, To make sure that you’ll attend our Official Briefing as an important Pre-meeting. The reason we do so is we want to make sure that you get proper mental guidance and necessary information just to have a recheck of equipment and goods for the journey to make sure you haven't forgotten anything and if forgotten, then make sure that you are provided with those things ASAP on that very day. This pre-meeting will give a clear idea about the necessary types of equipment and the challenges you may face in the trek, information about the climates and weather conditions, and emotional support by the officials which will be a kind of motivational seminar for you to be prepared and excited about the trek. Similarly, it is best to have at least 1 or 2 days extra cause the flight from Kathmandu to Lukla or from Lukla to Kathmandu might be canceled or delayed due to bad weather and that might make you miss your international flight back home.
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- 3rd -->
                        <div class="trip-detail__card" id="photos-videos">
                            <div class="sub-title">
                                <svg class="search-icon">
                                    <use xlink:href="images/sprite.svg#icon-file-picture"></use>
                                </svg>
                                <h2>Everest Base Camp tour Videos &amp; Pictures: Truly a Once in a Lifetime Experience in Khumbu region of Nepal </h2>
                            </div>
                            <div class="mt-5 mb-1 video-list">
                                <iframe width="100%" height="500" src="https://www.youtube.com/embed/fH3yq-qpKvs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="image-list">
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <a href="images/package1.jpg" data-lightbox="image-gallery">
                                            <img src="images/package1.jpg" alt="" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <a href="images/package2.jpg" data-lightbox="image-gallery">
                                            <img src="images/package2.jpg" alt="" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <a href="images/package3.jpg" data-lightbox="image-gallery">
                                            <img src="images/package3.jpg" alt="" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <a href="images/package1.jpg" data-lightbox="image-gallery">
                                            <img src="images/package1.jpg" alt="" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <a href="images/package2.jpg" data-lightbox="image-gallery">
                                            <img src="images/package2.jpg" alt="" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <a href="images/package3.jpg" data-lightbox="image-gallery">
                                            <img src="images/package3.jpg" alt="" class="img-fluid w-100">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End 3rd -->

                        <!-- Trip Detail Card #itinerary -->
                        <div class="trip-detail__card" id="itinerary">
                            <div class="sub-title">
                                <svg class="search-icon">
                                    <use xlink:href="images/sprite.svg#icon-list2"></use>
                                </svg>
                                <h2>Everst Base Camp</h2>
                            </div>
                            <ol class="itinerary-list">
                                <li class="itinerary-item">
                                    <span class="day-count">
                                        <span class="day-text">day</span>
                                        <span class="day-num">1</span>
                                    </span>
                                    <h2> Flight from Kathmandu (1,400 m / 4,593 ft) to Lukla (2,850m/9,350 ft) to Phakding (2,650 m/ 8,562 ft)</h2>
                                    
                                    <table class="itinerary-item__table">
                                        <tbody class="itinerary-item__table-body">
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="images/sprite.svg#icon-travel-walk"></use>
                                                        </svg>
                                                    </span>
                                                    Trek Distance
                                                </th>
                                                <td> 6.2km/3.8miles </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="images/sprite.svg#icon-airplanemode_on"></use>
                                                        </svg>
                                                    </span>
                                                    Flight Hours
                                                </th>
                                                <td> 40 Minutes </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="images/sprite.svg#icon-stop-watch"></use>
                                                        </svg>
                                                    </span>
                                                    Highest Altitude
                                                </th>
                                                <td> 2,850m/9,350 ft. </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="images/sprite.svg#icon-stop-watch"></use>
                                                        </svg>
                                                    </span>
                                                    Trek Duration
                                                </th>
                                                <td> 3 hours </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Our journey towards <strong>EBC</strong>&nbsp;after landing at <strong>Lukla heading to Phakding</strong> is going to very exciting as it'll be our 1st day of the trek. After our exciting and scenic 40 minutes’ flight, we will land at the Tenzing Hillary Airport at Lukla. We will begin our trek through <strong>Chaurikharka village</strong> and descent towards <strong>Dudhkoshi Ghat (2,530m/8,300ft)</strong> village of Lukla till we reach Phakding. The trek today will be short and enjoyable as we’ll also be acclimatizing to the weather. With spare time on our hands, we may visit the local monasteries (<strong>Rimishung Monastery</strong>) around and prepare ourselves for the long trek the next day. By doing all these things our 1st day of the Everest Base Camp trek will be successful.</p>
                                    <div class="highlight-card">
                                        <ul class="highlight-list">
                                            <li>
                                                <i class="fa fa-bath"></i>
                                                </svg>
                                                <span>Overnight at Khumbu Travel Lodge” room with attached bathroom.</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-spoon"></i>
                                                <span>Included standard meals ( Breakfast + Lunch + Dinner )</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="itinerary-item">
                                    <span class="day-count">
                                        <span class="day-text">day</span>
                                        <span class="day-num">2</span>
                                    </span>
                                    <h2>Trek from Phakding ( 2,650 m/ 8,562 ft ) to Namche Bazaar (3,440m/11,285 ft)</h2>
                                    
                                    <table class="itinerary-item__table">
                                        <tbody class="itinerary-item__table-body">
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                    <svg class="search-icon">
                                                        <use xlink:href="images/sprite.svg#icon-travel-walk"></use>
                                                    </svg>
                                                    </span>
                                                    Trek Distance
                                                </th>
                                                <td> 7.4km/4.6miles </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <i class="fa fa-area-chart"></i>
                                                    </span>
                                                    Highest Altitude
                                                </th>
                                                <td> 3,440m/9,350 ft. </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="images/sprite.svg#icon-stop-watch"></use>
                                                        </svg>
                                                    </span>
                                                    Trek Duration
                                                </th>
                                                <td> 6 hours </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>We'll continue along the northern bank of the <strong>Dudh Koshi River</strong> with the majestic view around. We will be crossing many suspension bridges over the Dudh Koshi River, including the Hillary Suspension Bridge. Again, following the trail, we will arrive at the <strong>Sagarmatha National Park</strong> Check Post where we will have our permits registered. we'll again climb through dense forests which is a bit challenging for trekkers. We will also see the first sight of <strong>Mt. Everest</strong> there. Trekking further, we will finally arrive at Namche Bazaar; the gateway to Everest crossing the woods and stones over the slopes. In this way, our <strong>2nd day towards Might Everest</strong>&nbsp;will be Successful.</p>
                                    <div class="highlight-card">
                                        <ul class="highlight-list">
                                            <li>
                                                <i class="fa fa-bath"></i>
                                                </svg>
                                                <span>Overnight at "Sakura Gues House" room with attached bathroom.</span>
                                            </li>
                                            <li>
                                                <svg class="icon-small">
                                                    <use xlink:href="images/sprite.svg#icon-spoon-knife"></use>
                                                </svg>
                                                <span>Included standard meals ( Breakfast + Lunch + Dinner )</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <!-- END Trip Detail Card #itinerary -->


                        <!-- TRIP DETAIL INCLUDES -->
                        <div class="trip-detail__card" id="includes-excludes">
                            <div class="sub-title">
                                <i class="fa fa-check-circle"></i>
                                <h2>What is Included in my 14 Days EBC tour package?</h2>
                            </div>
                            <ul class="list list--check-bullet marb-30">
                                <li>Domestic Flights (Kathmandu – Lukla – Kathmandu) Tickets and airport departure taxes</li>
                                <li>Six nights at Lukla, Phakding and Namche room with private attached bathroom, Seven nights in standard room at Tengboche (2 N), Dingboche (2 N), Loboche, Gorakshep, and Pheriche (twin sharing room) - 13 Nights</li>
                                <li>All Standard Meals (13 Lunches, 14 Dinners and 14 Breakfasts) during the trek.</li> <li>Government License holder English Speaking Discovery World Trekking experienced and qualified trek leader,(12 or above trekkers: 1 assistant guide) and porter to help trekkers luggage. (2 trekkers:1 porter "9 kg per trekker max limit")</li> <li>Coverage of Guides and Porters, Their meals, insurance, salary, lodging, transportation, flight and other necessary equipment.</li> <li>Water purification tablets for safe drinking water</li> <li>Sagarmatha National Park entry permit fee</li> <li>Khumbu Pashang Lhamu Rural Municipality fees.</li> <li>Snacks (cookies) and Seasonal fresh fruits every day</li> <li>All government, Local taxes and official Expenses</li> <li>Assistance in arranging rescue operation in case of complicated health condition (funded by travel insurance)</li> <li>Souvenir - A company's T-shirt &amp; Cap</li> <li>Discovery World Trekking’s appreciation of certificate after the successful trek</li> <li>Farewell Dinner at the end of the trek</li> 
                                
                            </ul>
                        </div>
                        <!-- END TRIP DETAIL INCLUDES  -->
                        
                        <!-- TRIP DETAIL EXCLUDES -->
                        <div class="trip-detail__card">
                            <div class="sub-title">
                                <i class="fa fa-times-circle"></i>
                                <h2>What is Excluded from package?</h2>
                            </div>
                            <ul class="list list--cross-bullet marb-30">
                                <li>International flight airfare</li>
                                <li>Nepal Entry Visa Fees for multiple Entries on arrival at Tribhuwan Internationa Airport- (15 days - $25-30, 30 days- $40-50 and 90 days- $100-110)</li>
                                <li>Excess baggage charges (Limit is 9kg per Person)</li> <li>All Accommodation and meals in Kathmandu, before and after we start our journey</li> <li>Extra night accommodation in Kathmandu due to early arrival or late departure, early return from the trek.</li> <li>Personal expense (shopping, snacks, boil bottle water, hot and cold drinks, hot shower, Alcohol, Wi-Fi, telephone call, battery re-charge fee), extra porters etc</li> <li>Personal clothing and gear</li> <li>Travel insurance which has to cover emergency high-altitude rescue and evacuation compulsory</li> <li>Tips for guide and porters (Recommended by the Culture)</li> <li>Additional costs or delays caused by out of management control, for example, landslide, weather condition, itinerary modification due to safety concerns, illness, change of government policies, strikes etc.</li> <li>All the costs and expenses which are not listed in "cost includes" will be counted as Excludes</li> </ul>
                        </div>
                        <!-- END TRIP DETAIL EXCLUDES -->

                        <!-- TRIP DETAIL #MAP -->
                        <div class="trip-detail__card" id="map">
                            <div class="sub-title">
                                <i class="fa fa-map-o"></i>
                                <h2>Official Everest Base Camp Trek Map : Kathmandu - EBC </h2>
                            </div>

                            <div class="route-map">
                                <img class="lozad" alt="everest base camp trek map" src="https://www.discoveryworldtrekking.com/media/2415/everest-base-camp-trek-map.jpg" data-loaded="true" class="img-fluid w-100">
                            </div>
                        </div>
                        <!-- END TRIP DETAIL #MAP -->

                        <!-- TRIP DETAILS #EQUIPMENTS -->
                        <div class="trip-detail__card trip-detail__card--equipment" id="equipments">
                            <div class="sub-title">
                                <i class="fa fa-suitcase"></i>
                                <h2>Packing list for Everest base camp in Nepal 2021 - 2022</h2>
                            </div>
                            <p>Packing for the Everest Base Camp trek requires certain preparations and checklists of gears &amp; equipment for the journey to be comfortable. It is always best to carry the basic clothing and accessories for the trek.<br>We understand that our clients have their own preference for the clothing we highly recommend to consult with us before packing to know what to expect in the trek, we have listed some useful clothing &amp; gears during the trek. The <strong>following list of items &amp; clothing can really come in handy</strong></p>

                            <div class="list-group">
                                <h3 class="list-group__title">Head</h3>   
                                <ul class="list list--hand-bullet">
                                    <li>Sun hat or scarf</li>
                                    <li>Winter hat or insulating hat or Wide-brimmed hat</li>
                                    <li>Headlight with extra batteries</li>
                                </ul>
                            </div>
                            <div class="list-group">
                                <h3 class="list-group__title">Face</h3>
                                <ul class="list list--hand-bullet">
                                    <li>Sunscreen</li>
                                    <li>Sunglass with UV protection</li>
                                    <li>Face/body wipes</li>
                                    <li>Hands</li>
                                    <li>Lightweight gloves</li>
                                    <li>Heavyweight winter gloves</li>
                                </ul>
                            </div>
                            <div class="list-group">
                                <h3 class="list-group__title"> Body </h3>
                                <ul class="list list--hand-bullet">
                                    <li>Hiking shirts</li>
                                    <li>Long-sleeved shirt</li>
                                    <li>Hooded rain jacket</li>
                                    <li>Fleece jacket</li>
                                    <li>Lightweight cotton pants</li>
                                    <li>T-Shirt (bring Lightweight wool)</li>
                                    <li>Polypropylene underwear</li>
                                    <li>Down jacket (available for rent in Kathmandu)</li>
                                    <li>Sweater</li>
                                    <li>Waterproof jacket and pants</li>
                                </ul>
                            </div>
                            
                        </div>
                        <!-- END TRIP DETAILS #EQUIPMENTS -->
                        
                        <!-- TRIP DETAILS #TRIPINFO-->
                        <div class="trip-detail__card" id="tripinfo">
                            <div class="sub-title">
                                <i class="fa fa-info-circle"></i>
                                <h2>Guided Everest Base Camp Tour Package Information</h2> 
                            </div>
                            <div>
                                <div class="note-list">
                                    <div class="note-item">
                                        <h4> We’ll welcome you at Tribhuvan International Airport </h4>
                                        <p>Discovery World Trekking provides free airport arrival and departure transfer on any flight for the <strong>Everest Base Camp hike</strong>&nbsp;package. You will be received from our representative crew from Discovery World Trekking regardless of the flight you take holding a pamphlet of your name and our company name with a warm-hearted welcome with either a khada or a marigold garland and you’ll be escorted to your hotel with all comfort possible.</p>
                                    </div>
                                    <div class="note-item">
                                        <h4> Hiking up to Everest Base Camp elevation</h4>
                                        <p><span style="font-weight: 400;">You will arrive in Nepal, Kathmandu at Tribhuvan International Airport as that is the only international airport. There are plenty of </span><span style="font-weight: 400;">Hotels in Kathmandu</span><span style="font-weight: 400;">, you can select the hotel</span><span style="font-weight: 400;"> of your choice(</span><span style="font-weight: 400;">We could manage/recommend hotels if required or you haven’t done it already)</span><span style="font-weight: 400;"> is required upon arrival which is not included in the package. Then the next day, in the early morning we will take a domestic </span><strong>flight to Lukla</strong><span style="font-weight: 400;">, approximately 40 minutes.</span></p>
                                    </div>
                                    <div class="note-item">
                                        <h4> Is "Everest Base Camp" is safe to Travel</h4>
                                        <p><span style="font-weight: 400;">The answer is yes, it’s safe to travel to Everest Base camp.</span><span style="font-weight: 400;"> &nbsp;</span><span style="font-weight: 400;">Furthermore, in the route, you won’t find many people as the long trails go for </span><strong>12-14 days long maintaining your personal health </strong><span style="font-weight: 400;">with physical challenges and a blend of</span><strong> mother nature's beauty.</strong><span style="font-weight: 400;"> The route consists of notable places like Lukla, Namche Bazar, Lobuche, </span><strong>Gorak sheep,</strong><span style="font-weight: 400;"> and so on where the combined population of the Area is roughly 4 thousand. You’ll be completely wandering in the solace of nature along with our crew ( Trek leaders and porters) who will help you along the way. We understand it’s been a hard time for everyone so we have made sure you’ll be surrounded by motivational and inspiring aura throughout the journey,</span></p>
                                        <p><span style="font-weight: 400;">&nbsp;To normalize tourism back again as most of us are already vaccinated, here are the following measures we’ve taken to make travel as safe as possible.</span></p>
                                        
                                        <ul class="list list--hand-bullet">
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Our guides are well trained with </span><strong>Intensive wilderness First Aid</strong></li><li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Trek leaders and guides have years of trekking experience who can help you if there is any kind of uneasiness and assure happiness &amp; satisfaction are guaranteed.</span></li><li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">We'll have High-quality masks &amp; Gloves with sanitizers for everyday use throughout the journey for the DWT team assisting you.</span></li><li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Encouragements and motivation will be everyday perks</span></li><li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Food &amp; Accommodation in mountains will be rechecked for extra hygiene.</span></li>
                                        </ul>
                                    </div>

                                    <div class="note-item">
                                        <h4>Everest Base Camp Accommodation</h4>
                                        <p><span style="font-weight: 400;">Everest base camp trek accommodation</span> <span style="font-weight: 400;">includes a 13 nights lodge to lodge stay at a mountain where we use the best available lodge and select the best accommodation on Everest. We provide six nights twin sharing room with a private attached bathroom at Lukla, Namche</span><strong>(3 N),</strong><span style="font-weight: 400;"> and Phakding</span><strong>(2 N),</strong><span style="font-weight: 400;"> seven nights twin sharing accommodation at Tengboche</span><strong>(2 N)</strong><span style="font-weight: 400;">, Dingboche</span><strong>(2 N),</strong><span style="font-weight: 400;"> Lobuche, Gorakshep, and Pheriche.</span></p>

                                        <p><span style="font-weight: 400;">For solo trekkers -a single private room with attached bathroom at Lukla, Namche, and Phakding, single private accommodation at Tengboche (</span><strong>2 N</strong><span style="font-weight: 400;">), Dingboche(</span><strong>2 N</strong><span style="font-weight: 400;">), Lobuche, Gorakshep, and Pheriche.</span></p>
                                        <p><span style="font-weight: 400;">Two nights of Hotels in Kathmandu before and after the trek is required which is not included in the package. Kathmandu has a wide range of hotels for all budgets and your interest. We prefer your choice.</span></p>
                                    </div>
                                    <div class="highlight-card">
                                        <p>Hot showers, Wi-Fi will be available at an extra cost in possible places.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TRIP DETAILS #TRIPINFO-->
                        
                        <!-- TRIP DETAILS #COST-DATES -->
                        <div class="border-0 trip-detail__card trip-detail__departure-card" id="cost-dates">
                            <div class="sub-title">
                                <i class="fa fa-calendar"></i>
                                <h2>Join Upcoming Trips</h2>
                            </div>
                            <div class="departure-block__header">
                                <div class="departure-block__description">
                                    <p>Inquire Now to get the best deals or share with friends to plan together. All trips are group based. For custom trips, <a href="https://www.discoveryworldtrekking.com/contact-us">contact us</a>. </p>
                                </div>
                                <div class="departure-block__filter">
                                    <!-- <div class="custom-select"> -->
                                        <!-- <select class="select-month-year select2-hidden-accessible" id="upcoming-trip-select" data-trip-id="6" name="month-year" data-select2-id="upcoming-trip-select" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected" data-select2-id="2">Select Month, Year</option><option value="2021-10" data-select2-id="5">October, 2021</option><option value="2021-11" data-select2-id="6">November, 2021</option><option value="2021-12" data-select2-id="7">December, 2021</option><option value="2022-01" data-select2-id="8">January, 2022</option><option value="2022-02" data-select2-id="9">February, 2022</option><option value="2022-03" data-select2-id="10">March, 2022</option><option value="2022-04" data-select2-id="11">April, 2022</option><option value="2022-05" data-select2-id="12">May, 2022</option><option value="2022-06" data-select2-id="13">June, 2022</option><option value="2022-07" data-select2-id="14">July, 2022</option><option value="2022-08" data-select2-id="15">August, 2022</option><option value="2022-09" data-select2-id="16">September, 2022</option><option value="2022-10" data-select2-id="17">October, 2022</option><option value="2022-11" data-select2-id="18">November, 2022</option><option value="2022-12" data-select2-id="19">December, 2022</option><option value="2023-01" data-select2-id="20">January, 2023</option><option value="2023-02" data-select2-id="21">February, 2023</option><option value="2023-03" data-select2-id="22">March, 2023</option><option value="2023-04" data-select2-id="23">April, 2023</option><option value="2023-05" data-select2-id="24">May, 2023</option><option value="2023-06" data-select2-id="25">June, 2023</option><option value="2023-07" data-select2-id="26">July, 2023</option><option value="2023-08" data-select2-id="27">August, 2023</option><option value="2023-09" data-select2-id="28">September, 2023</option><option value="2023-10" data-select2-id="29">October, 2023</option><option value="2023-11" data-select2-id="30">November, 2023</option><option value="2023-12" data-select2-id="31">December, 2023</option><option value="2024-01" data-select2-id="32">January, 2024</option><option value="2024-02" data-select2-id="33">February, 2024</option><option value="2024-03" data-select2-id="34">March, 2024</option><option value="2024-04" data-select2-id="35">April, 2024</option><option value="2024-05" data-select2-id="36">May, 2024</option><option value="2024-06" data-select2-id="37">June, 2024</option><option value="2024-07" data-select2-id="38">July, 2024</option><option value="2024-08" data-select2-id="39">August, 2024</option><option value="2024-09" data-select2-id="40">September, 2024</option>
                                        </select> -->
                                    <!-- </div> -->
                                </div>
                            </div>

                            <table id="booking-dates" class="table table-hover" style="display: table; position: relative; ">
                                <thead class="thead">
                                    <tr>
                                        <th scope="col">Departure Date</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Trip Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="departure-list">
                                    <tr class="departure-list__item">
                                        <td class="departure-list__date">
                                            <strong>14 Days</strong>10 Oct, 2021 - 23 Oct, 2021
                                        </td>
                                        <td class="departure-list__price">
                                            <del>$1800</del> $1140
                                            <span class="discount-save__badge">save $660</span>
                                        </td>
                                        <td class="departure-list__trip-status brown-text">Guaranteed</td>
                                        <td class="departure-list__btn">
                                            <a class="btn btn--border btn--small" href="https://www.discoveryworldtrekking.com/departures/80794">Enquire Now</a> 
                                        </td> 
                                    </tr>
                                    <tr class="departure-list__item">
                                        <td class="departure-list__date">
                                            <strong>14 Days</strong>10 Oct, 2021 - 23 Oct, 2021
                                        </td>
                                        <td class="departure-list__price">
                                            <del>$1800</del> $1140
                                            <span class="discount-save__badge">save $660</span>
                                        </td>
                                        <td class="departure-list__trip-status brown-text">Guaranteed</td>
                                        <td class="departure-list__btn">
                                            <a class="btn btn--border btn--small" href="https://www.discoveryworldtrekking.com/departures/80794">Enquire Now</a> 
                                        </td> 
                                    </tr>
                                    <tr class="departure-list__item">
                                        <td class="departure-list__date">
                                            <strong>14 Days</strong>10 Oct, 2021 - 23 Oct, 2021
                                        </td>
                                        <td class="departure-list__price">
                                            <del>$1800</del> $1140
                                            <span class="discount-save__badge">save $660</span>
                                        </td>
                                        <td class="departure-list__trip-status brown-text">Guaranteed</td>
                                        <td class="departure-list__btn">
                                            <a class="btn btn--border btn--small" href="https://www.discoveryworldtrekking.com/departures/80794">Enquire Now</a> 
                                        </td> 
                                    </tr>
                                    <tr class="departure-list__item">
                                        <td class="departure-list__date">
                                            <strong>14 Days</strong>10 Oct, 2021 - 23 Oct, 2021
                                        </td>
                                        <td class="departure-list__price">
                                            <del>$1800</del> $1140
                                            <span class="discount-save__badge">save $660</span>
                                        </td>
                                        <td class="departure-list__trip-status brown-text">Guaranteed</td>
                                        <td class="departure-list__btn">
                                            <a class="btn btn--border btn--small" href="https://www.discoveryworldtrekking.com/departures/80794">Enquire Now</a> 
                                        </td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- END TRIP DETAILS #COST-DATES -->
                        
                        <!-- TRIP DETAILS  -->
                        <div class="border-0 trip-detail__card">
                            <div class="sub-title">
                                <i class="fa fa-user"></i>
                                <h2>Guided Everest Base Camp Tour Package Perks</h2>
                            </div>
                            <div class="tag-items">
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    Team of highly experienced Experts 
                                </div>
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-credit-card-alt"></i>
                                    </span>
                                    No Booking Or Credit Card Fee 
                                </div>
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-bookmark"></i>
                                    </span>
                                    Hasle-Free Booking
                                </div>
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-certificate"></i>
                                    </span>
                                    Your Hapiness Guaranteed
                                </div>
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-money"></i>
                                    </span>
                                    Hasle-Free Booking
                                </div>
                            </div>
                        </div>
                        <!-- END TRIP DETAILS -->

                        <!-- DISCOUNTED PRICE -->
                        <div class="border-none trip-detail__card">
                            <div class="sub-title">
                                <i class="fa fa-money"></i>   
                                <h2>Group Discount Prices</h2>
                            </div>
                            <table class="discount-card discount-card--transparent">
                                <thead class="discount-card__header">
                                    <tr> <th class="discount-card__header-title">No. of Persons</th> <th class="discount-card__header-title">Price per Person</th> </tr> </thead> <tbody class="discount-card__list"> <tr> <td class="person">1 Pax</td> <td class="discount-price">US$ 1470</td> </tr> <tr> <td class="person">2 Paxes</td> <td class="discount-price">US$ 1190</td> </tr> <tr> <td class="person">3 Paxes</td> <td class="discount-price">US$ 1175</td> </tr> <tr> <td class="person">4 - 6 Paxes</td> <td class="discount-price">US$ 1140</td> </tr> <tr> <td class="person">7 - 12 Paxes</td> <td class="discount-price">US$ 1100</td> </tr> <tr> <td class="person">13 - 18 Paxes</td> <td class="discount-price">US$ 1075</td> </tr> <tr> <td class="person">19 - 24 Paxes</td> <td class="discount-price">US$ 1050</td> </tr> <tr> <td class="person">25 - 30 Paxes</td> <td class="discount-price">US$ 1030</td> </tr> </tbody> </table> </div>
                        <!-- END DISCOUNTED PRICE -->
                        
                        <!-- TRAVELER'S REVIEW -->
                        
                        <!-- END TRAVELER'S REVIEW -->

                        <!-- EVEREST TRAVELER'S REVIEW -->
                        <div class="border-0 trip-detail__card" id="review">
                            <div class="sub-title">
                                <i class="fa fa-commenting-o"></i>
                                <h2>Everest Base camp Trek Company Reviews</h2>
                            </div>

                            <!-- TRIP ADVISOR REVIEW -->
                            <div class="review-card review-card--trip-adviser">
                                <div id="TA_selfserveprop906" class="TA_selfserveprop">
                                    <ul id="RRHWlJZQ9" class="TA_links ihLTT9DkzLu"> <li id="CeXZsPUe3" class="44wrhw2ymb">
                                        <a target="_blank" href="https://www.tripadvisor.com/" rel="noreferrer">
                                        <img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="Trip Advisor"></a> </li>
                                    </ul>
                                </div>
                                <a href="#" class="btn btn--small" target="_blank" rel="noopener noreferrer">Write a Review on Tripadvisor
                                    <i class="fa fa-chevron-right"></i>   
                                </a>
                            </div>
                            <!-- END TRIP ADVISOR REVIEW -->
                            
                            <!-- GOOGLE REVIEW -->
                            <div class="review-card review-card--google trip-review-card--google">      
                                <div class="review-card__content">
                                <div class="google-reviews">
                                    <div class="google-review-title">
                                        <i class="fa fa-google"></i> 
                                        <h3>Discovery World Trekking</h3> <!-- Review count will be inserted here by JS --> <div class="google-review-title__footer"> <div class="google-review-total-rating">5</div> <div class="google-reviews-stars-wrapper"> <span class="star-rating star-rating--brand"> <!-- Review start width will be replace by JS --> <span class="star-rating__gold google-review-stars" style="width: 100%;"></span> </span> </div> <div class="google-review-count__wrap"> <span class="google-review-count">190</span> reviews form Google </div> </div> </div> <!-- Reviews will be inserted her by JS --> <div class="google-reviews-items"><div class="google-review-item">
                                <div class="review-date">2021-04-30</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    ."Discovery World Trekking" is a very professional company.
                                    .They treat you as family.
                                    . You are always their number one priority.
                                    . They are very understanding.
                                    . Friendly
                                    . Helpful
                                    . Optimistic
                                    . Down to earth
                                    . Respectful

                                    I would also like to mention something very sweet. I got sick on the mountain and Mr.Paul stayed in contact with me, gave me advice, supported me. He made sure that I would wake up the second day feeling better than the day before.

                                    I would also like to thank the lovely guide "Milan" and to a very strong guide assistant "Havy".                 
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a-/AOh14Gj38Ois8fs5qpJW06hYDjIA9HNTouu2lYxABt4RpA=s128-c0x00000000-cc-rp-mo" alt="Maryam Kairouz">                  
                                    </div>      
                                    <div class="review-author-name">
                                        Maryam Kairouz       
                                    </div>         
                                </div>
                            </div>
                            <div class="google-review-item">
                                <div class="review-date">2021-04-02</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    This is the Best Trekking Company you'll ever find. Right from the Landing in Kathmandu to farewell, they treat you as the part of the family. I travelled during Covid times and they offered the best facilities one could. All the Hotels, food provided were top class. I was unable to carry my bag and my guide didn't even hesitated and carried my belongings all the way till the pass. Don't hesitate just go with them. Highly recommended.                 
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a-/AOh14Gin0xuDClQH5yryNQxtjKcbf7e3VdmwdIK33CKkjQ=s128-c0x00000000-cc-rp-mo" alt="TheLaughPlanet">                  
                                    </div>      
                                    <div class="review-author-name">
                                        TheLaughPlanet       
                                    </div>         
                                </div>
                            </div>
                            <div class="google-review-item">
                                <div class="review-date">2021-09-05</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    Team of Highly Experienced, the best service and feel family.                 
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a/AATXAJxvfhK5g7gjzd-fYFeGs-JMiPCC20x7GZGdlrC_=s128-c0x00000000-cc-rp-mo" alt="hiring dwt">                  
                                    </div>      
                                    <div class="review-author-name">
                                        hiring dwt       
                                    </div>         
                                </div>
                            </div>
                            <div class="google-review-item">
                                <div class="review-date">2021-04-12</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    The First trek to Annapurna Base Camp in Nepal and what a life-changing experience with Discovery World Trekking. Paul and our trek leader Dol,Jit were so friendly, caring and helping  and made us feel very comfortable.Mountain views are amazing and beautiful culture.We are looking forward to coming back to do Everest Base camp with this professional company :) SERIOUSLY RECOMMEND! You will not be disappointed!                 
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a/AATXAJxrEG-mEM0o7IKpsd-HUkj7Bw3gphHReTyEu5Rq=s128-c0x00000000-cc-rp-mo" alt="mustafa murat ozcelik">                  
                                    </div>      
                                    <div class="review-author-name">
                                        mustafa murat ozcelik       
                                    </div>         
                                </div>
                            </div><div class="google-review-item">
                                <div class="review-date">2021-04-03</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    Probably the best trekking agency in Nepal. I was solo and had an amazing time in Annapurna Circuit in this COVID times. All the facilities provided was top notch. My guide Mr. Manish was very Helpful and was very knowledgeable about the Mountains. Highly recommended                 
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a/AATXAJza1DsvJT3rT6Tf5aj26uXrPtCt1wk_IfivPd_D=s128-c0x00000000-cc-rp-mo" alt="Ashish Jha">                  
                                    </div>      
                                    <div class="review-author-name">
                                        Ashish Jha       
                                    </div>         
                                </div>
                            </div></div> </div> </div> <div class="review-card__footer"> <a href="https://search.google.com/local/writereview?placeid=ChIJZV6Bzf0Y6zkRB4mxi-9XC-c" class="btn btn--small" target="_blank">
                            <i class="fa fa-edit"></i>
                            Write a Review on Google </a> </div> </div>
                            <!-- END GOOGLE REVIEW -->
                            

                            <!-- MORE REVIEW -->
                            <div class="review-list" id="reviews-list">
                                <div class="review-item">
                                    <h3 class="review-item__title">Trek of a lifetime with Discovery!</h3>
                                    <div class="author-info">
                                        <div class="author-info__image" style="background-image: url('https://www.discoveryworldtrekking.com/media/1351/conversions/Daniel-tiny.jpg')"></div>
                                        
                                        <div class="author-info__wrap"> 
                                            <span class="author-info__name">Daniel</span>
                                            <div class="trip-card__review">
                                                <span class="star-rating">
                                                    <span class="star-rating__gold" style="width:100%"></span>
                                                </span> 5 - Excellent
                                            </div>
                                            <span class="review-date">11/15/2018</span>
                                            </div>
                                        </div>
                                        <p>We had an amazing experience climbing to Everest Basecamp with Discovery. Our guide, Simbir, helped us each step of the way. We couldn’t have done it without him. Our porter Gagat was amazing as well. He even accompanied us to Basecamp to make sure we made it! It will be 11 days that we will never forget and it was all thanks to Discovery.</p>
                                    </div>
                            </div>
                            <!-- END MORE REVIEW -->
                        </div>
                        <!-- EVEREST END TRAVELER'S REVIEW -->

                        <!-- TRIP DETAIL #DOWNLOAD -->
                        <div class="border-0 trip-detail__card">
                            <div class="sub-title">
                                <i class="fa fa-file"></i>
                                <h2>Trip Downloads</h2>
                            </div>

                            <div class="trip-detail__info-btn">
                                <a href="#" target="_blank">
                                    <i class="fa fa-file"></i>
                                    Download the Trip PDF
                                </a>
                                <a href="#" target="_blank"> 
                                    <i class="fa fa-map"></i>
                                    Download Map
                                </a>
                            </div>
                        </div>
                        <!-- END TRIP DETAIL #DOWNLOAD -->
                                            
                        <!-- TRIP DETAIL SHARE -->
                        <div class="trip-detail__share">
                            <div class="social-share">
                                <span class="social-share__title">Share with your Friends</span>
                                <ul class="share-list">
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <!-- END TRIP DETAIL SHARE -->
                        
                        <!-- END TRIP DETAILS -->
                    </div>
                    
                    <!-- SIDER BAR STICKY -->
                    <div class="col-lg-4 col-sm-12 stickthis" id="sidebar-sticky">
                        <div class="mx-auto sidebar sidebar-block">
                                <div class="sidebar-block__card sidebar-block__card--pattern">
                                    <div class="trip-card__badge--wrap">
                                        <div class="trip-card__badge trip-card__badge--group">
                                            <i class="fa fa-users"></i>
                                            <span> Group</span> 
                                        </div>
                                    </div>
                                    <div class="sidebar-block__card-item package-price package-price--large">
                                        <span class="package-price__trip-days">14 Days</span>
                                        <span class="package-price__regular-price">from
                                            <span class="large-del">US$ 1800</span></span>
                                        <br>
                                        <span class="package-price__sale-price">
                                            US$
                                            <strong>1140</strong><sup>pp</sup>
                                        </span>
                                    </div>

                                    <div class="sidebar-block__discount-badge">
                                        <span class="sidebar-block__discount-save">Save $660 Per Pax</span>
                                    </div>

                                    <div class="sidebar-block__card-item discount-card discount-card--toggle discount-card--small">
                                        <h2 class="accordion__action-btn">We Offer Group Discount</h2> <div class="discount-card__accordion" style="display: none;"> 
                                            <table class="discount-card__table">
                                                <thead class="discount-card__header">
                                                    <tr> <th class="discount-card__header-title">No. of Persons</th> <th class="discount-card__header-title">Price per Person</th> </tr>
                                                </thead>
                                                <tbody class="sidebar-block__card-item discount-card__list">
                                                    <tr> <td class="person">1 Pax</td> <td class="discount-price">US$ 1470</td> </tr> <tr> <td class="person">2 Paxes</td> <td class="discount-price">US$ 1190</td> </tr> <tr> <td class="person">3 Paxes</td> <td class="discount-price">US$ 1175</td> </tr> <tr> <td class="person">4 - 6Paxes </td> <td class="discount-price">US$ 1140</td> </tr> <tr> <td class="person">7 - 12Paxes </td> <td class="discount-price">US$ 1100</td> </tr> <tr> <td class="person">13 - 18Paxes </td> <td class="discount-price">US$ 1075</td> </tr> <tr> <td class="person">19 - 24Paxes </td> <td class="discount-price">US$ 1050</td> </tr> <tr> <td class="person">25 - 30Paxes </td> <td class="discount-price">US$ 1030</td> </tr>
                                                </tbody> 
                                            </table>
                                        </div> 
                                    </div>
                                    
                                    <div class="sidebar-block__card-item sidebar-block__card-item--border">
                                        <div class="trip-card__review trip-card__review--badge">
                                            <span class="star-rating star-rating--brand">
                                                <span class="star-rating__gold" style="width:100%"></span>
                                            </span>
                                            <span class="review-badge">5 - Excellent</span>
                                            <span class="review-number">based on 45 reviews</span>
                                        </div>
                                        <a href="#cost-dates" class="btn btn--fullwidth btn--large btn--primary-hover btn--brand cost-dates--btn">
                                            Dates &amp; Prices
                                        </a>
                                        <a href="https://www.discoveryworldtrekking.com/trips/everest-base-camp-trek/inquire" target="_blank" data-bypass-react="true" class="btn btn--border btn--fullwidth btn--small">
                                            Ask Questions
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END OF SIDER BAR STICKY -->
                </div>
            </div>
        </section>

        <!-- FAQ BLOCK -->
        <div class="faq-block">
            <div class="container">
                <h2 class="faq-block__title curve-line">
                    FAQ's
                </h2>

                <div class="accordion-list">
                    <div class="accordion-list__item">
                        <div class="accordion-list__header" onclick="return toggleMe('faq1');">
                            <h3 class="accordion-list__item-title"> Is there any age limit or criteria for trekking to Everest Base Camp? </h3>
                            <span class="accordion-control"></span>
                        </div>
                        <div class="accordion-list__item-content" style="display: block;" id="faq1">
                            <p>
                                There is not an age limit but Discovery World Trekking does not recommend children to climb high altitudes as this may have severe effects on a child's health. However, you need to be in a good physique with a positive attitude. Discovery World Trekking does not recommend this trek to those who suffer from sensitive medical conditions such as heart or lung disease.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-list__item">
                        <div class="accordion-list__header" onclick="return toggleMe('faq2');">
                            <h3 class="accordion-list__item-title"> What is the luggage limit for porter and flight to Lukla? </h3>
                            <span class="accordion-control"></span>
                        </div>
                        <div class="accordion-list__item-content" style="display: none;" id="faq2">
                            <p>
                                Discovery World Trekking will provide one porter for two trekkers to carry 18 kgs of luggage (maximum 9 kg for each trekker). Please be sure your porters are not overloaded because they do not carry only your equipment but also lift your spirit to reach new heights, and your love, affection, and generosity can be the reason for them to work hard to take you to your destination. However, the weight limit on flights to the Everest region, basically to Lukla is a total of 10 kgs and you need to pay an extra amount per kg for the excess baggage. Discovery World Trekking pays up to 5 kgs of extra baggage making your total 15 kgs.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-list__item">
                        <div class="accordion-list__header" onclick="return toggleMe('faq3');">
                            <h3 class="accordion-list__item-title" > What is the weather condition at Everest Base Camp? </h3>
                            <span class="accordion-control"></span>
                        </div>
                        <div class="accordion-list__item-content" style="display: none;" id="faq3">
                            <p>
                                Weather on the trail to Everest Base Camp is always changing and impossible to predict. Here is a list of probable temperature and weather conditions in each month.
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- END FAQ BLOCK -->

        <!-- SPILT BLOCK -->
        <div class="spilt-block">
            <div class="spilt-block__community">
                <div class="spilt-block__item">
                    <p>Your Small Contribution Helps in the Development of Rural Communities</p>
                    <img src="https://www.discoveryworldtrekking.com/media/841/community-01.png" alt="Community">
                    <a href="#" class="btn btn--white btn--dark-hover btn--small">
                        Learn about our CSR
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="spilt-block__speciality">
                <div class="spilt-block__item">
                    <h4>What Sets Us Apart??</h4>
                    <ul class="list list--plane-bullet">
                        <li>Winner, Tripadvisor Excellence Award</li>
                        <li>Attractive &amp; Alternative Packages</li>
                        <li>Healthy, Safe and Hassle Free Travel</li>
                        <li>Your Happiness Is Guaranteed</li>
                        <li>Best affordable price guarantees</li>
                        <li>Flexible itinerary of the trek that suits you!</li>
                    </ul>
                    <a href="#" class="btn btn--white btn--dark-hover btn--small"> Learn About Why DWT? <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>        
        <!-- END SPILT BLOCK -->

        <!-- TRIP SECTION -->
        <section class="trip-section">
            <div class="trip-section__header trip-section__header--center">
                <h2 class="trip-section__title trip-section__title--small curve-line">Related Trips </h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="mx-auto mb-5 col-md-6 col-12">
                        <div class="border-0 card adventure__card">
                            <div class="adventure__card--image">
                                <img src="images/adventure1.jpg" alt="" class="card-img img-fluid">
                                <div class="adventure__card--type">
                                    <span> <i class="fa fa-users"></i> Group</span>
                                </div>
                                <div class="adventure__card--rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    of 45 reviews
                                </div>
                                <div class="adventure__card--price">
                                    from <span class="amount">US$ 1800</span>
                                    <span class="price">US$ 1140</span>
                                </div>

                                <div class="adventure__card--overlay">
                                    <a href="#" class="adventure__card--btn">Book Your Trip Now</a>
                                    
                                    <a href="#" class="btn">or Learn More</a>
                                </div>
                                <div class="featured-gradient"></div>
                            </div>
                            <div class="card-body">
                                <h3 class="adventure__card--title">Everest Base Camp Trek - 14 Days</h3>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-speedometer"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Grade</h4>
                                                <span>Challenging</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-calendar"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Duration</h4>
                                                <span>14 Days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-travel-walk"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Activity</h4>
                                                <span>Everest Treks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mx-auto mb-5 col-md-6 col-12">
                        <div class="border-0 card adventure__card">
                            <div class="adventure__card--image">
                                <img src="images/adventure2.jpg" alt="" class="card-img img-fluid">
                                <div class="adventure__card--type">
                                    <span> <i class="fa fa-certificate"></i> Best Seller</span>
                                </div>
                                <div class="adventure__card--rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    of 44 reviews
                                </div>
                                <div class="adventure__card--price">
                                    from <span class="amount">US$ 1150</span>
                                    <span class="price">US$ 580</span>
                                </div>

                                <div class="adventure__card--overlay">
                                    <a href="#" class="adventure__card--btn">Book Your Trip Now</a>
                                    
                                    <a href="#" class="btn">or Learn More</a>
                                </div>
                                <div class="featured-gradient"></div>
                            </div>
                            <div class="card-body">
                                <h3 class="adventure__card--title">Annapurna Base Camp Trek - 11 Days</h3>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-speedometer"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Grade</h4>
                                                <span>Challenging</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-calendar"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Duration</h4>
                                                <span>14 Days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-travel-walk"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Activity</h4>
                                                <span>Annapurna Treks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mx-auto mb-5 col-md-6 col-12">
                        <div class="border-0 card adventure__card">
                            <div class="adventure__card--image">
                                <img src="images/adventure4.jpg" alt="" class="card-img img-fluid">
                                <div class="adventure__card--type">
                                    <span> <i class="fa fa-users"></i> Group</span>
                                </div>
                                <div class="adventure__card--rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    of 45 reviews
                                </div>
                                <div class="adventure__card--price">
                                    from <span class="amount">US$ 1800</span>
                                    <span class="price">US$ 1140</span>
                                </div>

                                <div class="adventure__card--overlay">
                                    <a href="#" class="adventure__card--btn">Book Your Trip Now</a>
                                    <a href="#" class="btn">or Learn More</a>
                                </div>
                                <div class="featured-gradient"></div>
                            </div>
                            <div class="card-body">
                                <h3 class="adventure__card--title">Ama Dablam Camp Trek - 9 Days</h3>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-speedometer"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Grade</h4>
                                                <span>Challenging</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-calendar"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Duration</h4>
                                                <span>14 Days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-travel-walk"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Activity</h4>
                                                <span>Everest Treks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mx-auto mb-5 col-md-6 col-12">
                        <div class="border-0 card adventure__card">
                            <div class="adventure__card--image">
                                <img src="images/adventure3.jpg" alt="" class="card-img img-fluid">
                                <div class="adventure__card--type">
                                    <span> <i class="fa fa-certificate"></i> Best Seller</span>
                                </div>
                                <div class="adventure__card--rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    of 44 reviews
                                </div>
                                <div class="adventure__card--price">
                                    from <span class="amount">US$ 1150</span>
                                    <span class="price">US$ 580</span>
                                </div>

                                <div class="adventure__card--overlay">
                                    <a href="#" class="adventure__card--btn">Book Your Trip Now</a>
                                    
                                    <a href="#" class="btn">or Learn More</a>
                                </div>
                                <div class="featured-gradient"></div>
                            </div>
                            <div class="card-body">
                                <h3 class="adventure__card--title">Luxury Makalu - 11 Days</h3>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-speedometer"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Grade</h4>
                                                <span>Challenging</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-calendar"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Duration</h4>
                                                <span>14 Days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="media">
                                            <svg class="adventure__card--icon">
                                                <use xlink:href="images/sprite.svg#icon-travel-walk"></use>
                                            </svg>
                                            <div class="media-body">
                                                <h4>Activity</h4>
                                                <span>Phewa Treks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                    
                </div>
            </div>
        </section>
        <!-- END TRIP SECTION -->

        <section class="feature-block feature-block--gray-bg" id="feature-block">
            <div class="container">
                <div class="feature-block__slider--wrap">
                    <h2 class="feature-block__slider-title">Our History in Service Excellence</h2>
                </div>
                <!-- OWL CAROUSEL -->
                <div class="feature-block__carousel">
                    <div class="owl-carousel owl-theme feature-block__carousel--theme">
                        <!-- single item -->
                        <div class="item">
                            <div class="card feature-block__card">
                                <img src="images/feature-block1.gif" alt="" class="img-fluid card-img">
                            </div>
                        </div>
                        <!-- single item -->
                        <!-- single item -->
                        <div class="item">
                            <div class="card feature-block__card">
                                <img src="images/feature-block2.gif" alt="" class="img-fluid card-img">
                            </div>
                        </div>
                        <!-- single item -->
                    </div>
                </div>
                <!-- END OF OWL CAROUSEL -->
                
            </div>
        </section>

        <section class="associated-block">
            <div class="container">
                <h2 class="associated-block__title">WE ARE ASSOCIATED WITH:</h2>
                <div class="associated-list">
                    <span class="associated-list__item">
                        <img class="lozad" data-src="https://www.discoveryworldtrekking.com/media/1/ntb.png" alt="Nepal digital pictography" src="https://www.discoveryworldtrekking.com/media/1/ntb.png" data-loaded="true">
                    </span>
                    <span class="associated-list__item">
                        <img class="lozad" data-src="https://www.discoveryworldtrekking.com/media/2/nma.png" alt="NMA" src="https://www.discoveryworldtrekking.com/media/2/nma.png" data-loaded="true">
                    </span>
                    <span class="associated-list__item">
                        <img class="lozad" data-src="https://www.discoveryworldtrekking.com/media/3/nepal-gov.png" alt="Nepal GOV" src="https://www.discoveryworldtrekking.com/media/3/nepal-gov.png" data-loaded="true">
                    </span>
                    <span class="associated-list__item">
                        <img class="lozad" data-src="https://www.discoveryworldtrekking.com/media/4/taan.png" alt="TAAN" src="https://www.discoveryworldtrekking.com/media/4/taan.png" data-loaded="true">
                    </span>
                    <span class="associated-list__item">
                        <img class="lozad" data-src="https://www.discoveryworldtrekking.com/media/5/keep.png" alt="KEEP" src="https://www.discoveryworldtrekking.com/media/5/keep.png" data-loaded="true">
                    </span>
                    <span class="associated-list__item">
                        <img class="lozad" data-src="https://www.discoveryworldtrekking.com/media/6/himalayan-rescue-association.png" alt="Himalayan Rescue Association" src="https://www.discoveryworldtrekking.com/media/6/himalayan-rescue-association.png" data-loaded="true">
                    </span>
                </div>
            </div>
        </section>

        <!-- HERITAGE BLOCK -->
        <div class="heritage-block">
            <img class="heritage-block__thumbnail lozad" data-src="https://www.discoveryworldtrekking.com/frontend/assets/images/heritage-illustration.png" alt="Heritage Sketch" src="https://www.discoveryworldtrekking.com/frontend/assets/images/heritage-illustration.png" data-loaded="true">
        </div>
        <!-- END HERITAGE BLOCK -->

        <!-- TRADEMARK BLOCK -->
        <div class="trademark-block">
            <div class="trademark-block__wrap">
                <figure class="trademark-block__thumbnail">
                    <img class="lozad" data-src="https://www.discoveryworldtrekking.com/frontend/assets/images/discovery-world-trekking-logo.svg" alt="Discovery World Trekking" src="https://www.discoveryworldtrekking.com/frontend/assets/images/discovery-world-trekking-logo.svg" data-loaded="true">
                </figure>
                <div class="trademark-block__content">
                    <p>
                        Discovery World Trekking is trademark name of Discovery World Trekking Pvt. Ltd. Our Name, Logo, Slogan are trademark registered in Nepal. "The tourism department trekking and travel company license" - Number is 1495.
                    </p>
                </div>
            </div>
        </div>
        <!-- END TRADEMARK BLOCK -->
    </main>
    
    <!-- ========== End Inner Package ========== -->


    <!-- ============== PACKAGE NAVBAR ==============  -->
    <nav class="navbar navbar-expand-lg navbar-light package-navbar" id="package-navbar">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#overview">
                            <svg class="package-navbar__icon">
                                <use xlink:href="images/sprite.svg#icon-search"></use>
                            </svg>   
                            Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#photos-videos">
                            <svg class="package-navbar__icon">
                                <use xlink:href="images/sprite.svg#icon-file-picture"></use>
                            </svg>
                            Photos/Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#itinerary">
                            <svg class="package-navbar__icon">
                                <use xlink:href="images/sprite.svg#icon-list2"></use>
                            </svg>
                            Itinerary
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#includes-excludes">
                            <i class="fa fa-check-circle"></i>     
                            Includes/Excludes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#map">
                            <i class="fa fa-map-o"></i>  
                            Map
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#equipments">
                            <i class="fa fa-suitcase"></i>      
                            Equipments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tripinfo">
                        <i class="fa fa-info-circle"></i>
                        Trip Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cost-dates">
                            <i class="fa fa-calendar"></i>
                            Cost & Dates
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review">
                            <i class="fa fa-commenting-o"></i>
                            Reviews
                        </a>
                    </li>
                    <li class="nav-item phone-icon">
                        <a href="tel:9803828501">
                            <i class="fa fa-phone"></i>
                        </a>
                    </li>
                    <li class="nav-item cta-item">
                        <a class="btn btn-cta" href="#">
                            Book The Trip
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ============== END PACKAGE NAVBAR ==============  -->



    
    <?php include "partials/footer.php" ?>

    {{-- {{asset('assets/front/   ')}} --}}


    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/front/js/jquery.js')}}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- OWL CAROUSEL JS -->
    <script src="{{asset('assets/front/js/owl-carousel.min.js')}}"></script>
    
    <!-- JQUERY MATCHHEIGHT JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" integrity="sha512-/bOVV1DV1AQXcypckRwsR9ThoCj7FqTV2/0Bm79bL3YSyLkVideFLE3MIZkq1u5t28ke1c0n31WYCOrO01dsUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JQUERY COUNTER JS -->
    <script src="{{asset('assets/front/js/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('assets/front/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/front/js/lightbox.min.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('assets/front/js/main.js')}}"></script>

    <script>
         lightbox.option({
            'disableScrolling': true
        })
    </script>


 

</body>
</html>