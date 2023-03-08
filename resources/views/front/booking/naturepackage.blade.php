@extends('front.layouts.app')

@section('content')

  <!-- main -->
  <main class="mt-5">
    <div class="container">
        <div class="form-section__heading">
            <h2 class="form-section__heading--primary">Book Your Trip</h2>
            <h1 class="form-section__heading--secondary">{{$naturecostanddate->naturepackage->package_name}} - {{ $naturecostanddate->cad_day }}</h1>
        </div>

        <div class="form-section__content">
            <div class="row">
                <div class="col-lg-6 col-sm-12 mx-auto">
                    @if(session('message'))
                        <div class="alert alert-info alert-dismissible" id="successMessage">
                            {{session('message')}}
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{route('saveNaturePackageBooking', $naturecostanddate->id)}}" method="post"  class="form form-horizontal ">
                        @csrf
                        <h4 class="form-section__content--title">Booking Details</h4>
                        <div class="form-group form-group-mrb-60">
                            <label class="label-title">Departure Date From Listing</label>
                            <input type="text" class="form-control custom-control date" value="{{ $naturecostanddate->cad_date_from }}" readonly="" name="departure_date" id="departure_date" autocomplete="off">
                        </div>

                        <h4 class="form-section__content--title">Your Personal Details (Trip Leader)</h4>

                        <div class="form-group">
                            <label class="label-title">Full Name*</label>
                            <input type="text" class="custom-control form-control" placeholder="Enter Your Name" name="full_name" id="full_name" value="{{old('full_name')}}">
                        </div>

                        <div class="form-group">
                            <label class="label-title">Email Address*</label>
                            <input type="email" class="form-control custom-control" placeholder="example@example.com" name="email" id="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group"> 
                            <label class="label-title">Country*</label>
                            <select class="form-control custom-control custom-select--normal" name="country" value="{{old('country')}}">
                                                <option>Select Country</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua And Barbuda">Antigua And Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas The">Bahamas The</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Republic Of The Congo">Republic Of The Congo</option>
                                                <option value="Democratic Republic Of The Congo">Democratic Republic Of The Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'Ivoire (Ivory Coast)">Cote D'Ivoire (Ivory Coast)</option>
                                                <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="External Territories of Australia">External Territories of Australia</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji Islands">Fiji Islands</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia The">Gambia The</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey and Alderney">Guernsey and Alderney</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard and McDonald Islands">Heard and McDonald Islands</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong S.A.R.">Hong Kong S.A.R.</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea North">Korea North</option>
                                                <option value="Korea South">Korea South</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau S.A.R.">Macau S.A.R.</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Man (Isle of)">Man (Isle of)</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia">Micronesia</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="Netherlands The">Netherlands The</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory Occupied">Palestinian Territory Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua new Guinea">Papua new Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent And The Grenadines">Saint Vincent And The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Smaller Territories of the UK">Smaller Territories of the UK</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia">South Georgia</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard And Jan Mayen Islands">Svalbard And Jan Mayen Islands</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks And Caicos Islands">Turks And Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                <option value="Virgin Islands (US)">Virgin Islands (US)</option>
                                                <option value="Wallis And Futuna Islands">Wallis And Futuna Islands</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Yugoslavia">Yugoslavia</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                            </select> 
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label class="label-title">Contact Number*</label>
                                <input type="number" min="0" pattern="[0-9]*" class="form-control custom-control" placeholder="_ _ _ _ _ _ _ _ _" name="contact_no" id="contact_no" value="{{old('contact_no')}}"> 
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label class="label-title">Emergency Contact Number*</label>
                                <input type="number" min="0" pattern="[0-9]*" class="form-control custom-control" placeholder="_ _ _ _ _ _ _ _ _" name="emergency_contact_number" id="emergency_contact_number" value="{{old('emergency_contact_number')}}"> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label class="label-title">Your Flight Arrival Date</label>
                                <input type="date" min="0" pattern="[0-9]*" class="form-control custom-control" placeholder="_ _ _ _ _ _ _ _ _" name="flight_arrival_date" id="flight_arrival_date" value="{{old('flight_arrival_date')}}"> 
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label class="label-title">Your Flight Departure Date</label>
                                <input type="date" min="0" pattern="[0-9]*" class="form-control custom-control" placeholder="_ _ _ _ _ _ _ _ _" name="flight_departure_date" id="flight_departure_date" value="{{old('flight_departure_date')}}"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label-title">Other Information</label>
                            <textarea name="information" id="information" class="form-control custom-textarea" placeholder="Let us know all your inquiries and we will get back to you shortly.." cols="30" rows="5" style="resize: none;">{{old('information')}}</textarea>
                        </div>

                        <h4 class="form-section__content--title">Your Payment Information</h4>

                        <div class="form-group">
                            <label class="label-title">No Of Participants*</label>
                            <div class="input-group">
                                <button type="button" data-vendor_id="{{$naturecostanddate->id}}" id="subNatureBookingPrice" class="sub subNatureBookingPrice">-</button>
                                {{-- <input type="button" value="+" id="plus" /> --}}
                                <input type="number" name="number_of_person" id="1" value="1" min="1" max="20" class="participant-input"/>
                                <button type="button" data-vendor_id="{{$naturecostanddate->id}}" id="addNatureBookingPrice" class="add addNatureBookingPrice">+</button>
                            </div>
                        </div>

                        <div class="form-group border-bottom pb-4">
                            <div class="row">
                                <div class="col-8">
                                    <span class="package-price-title">Package Price (Per Person):</span>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="hidden" name="package_price_per_person" id="package_price_per_person" value="{{ $naturecostanddate->cad_discount_price }}">
                                    <span class="package-price-amount">Rs. {{ $naturecostanddate->cad_discount_price }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group border-bottom pb-4">
                            <div class="row">
                                <div class="col-8">
                                    <span class="package-price-title">Total Package Price: </span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="package-price-amount">Rs. </span>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label class="label-title">You Are Paying</label>
                            <input type="radio" name="paying" id="paying10">
                            <label for="paying10" class="mr-3">10% Deposit</label>

                            <input type="radio" name="paying" id="paying100">
                            <label for="paying100">100% Full Price</label>
                        </div> --}}

                        <div class="form-group border-bottom pb-4">
                            <div class="row">
                                <div class="col-8">
                                    <span class="package-price-title final-price">Your Total Payment </span>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="hidden" id="total_pricess" name="total_price">

                                   Rs. <span class="package-price-amount final-price" id="total_price"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="agree_terms_condition" id="terms">
                            <label for="ui-checkbox ui-checkbox-primary" class="ui-checkbox ui-checkbox-primary">
                            I Agree To NorthNepal.Com <a href="#">Terms and Conditions</a>
                            </label>
                        </div>

                        {{-- <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                            <input name="published" type="checkbox">
                            <span class="input-span"></span>Publish</label>
                        </div> --}}


                        <div class="form-group">
                            <div class="payment-option">
                                <img src="images/online-pay.png" alt="" class="img-fluid">
                                <p>
                                    This is a secure and SSL encrypted payment via 2C2P. Your credit card details are safe!
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" value="submit" class="btn btn--red btn--large btn--fullwidth enquiry-btn">Book Now</button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
