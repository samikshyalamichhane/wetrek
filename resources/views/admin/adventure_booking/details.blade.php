@extends('admin.layouts.app')

@section('content')

<div class="page-content fade-in-up">

                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Adventure Booking Details</div>

                                <div class="ibox-tools">

                                </div>
                            </div>

                            <!-- <h3>Blog Details</h3> -->
                            <div class="ibox-body" style="">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>Heading</th>
                                    <th>Details</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="info">
                                    <td>Departure Date </td>
                                    <td>{{$adventureBooking->departure_date}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Full Name</td>
                                    <td>{{$adventureBooking->full_name}}</td>
                                  </tr>
                                  <tr class="success">
                                    <td>Email Address</td>
                                    <td>{{$adventureBooking->email}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>Country</td>
                                    <td>{{$adventureBooking->country}}</td>
                                  </tr>
                                  <tr class="danger">
                                    <td>Package</td>
                                    <td>{{@$adventureBooking->adventurepackagecostanddate->adventurepackage->package_name}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Contact Number</td>
                                    <td>{{$adventureBooking->contact_no}}</td>
                                  </tr>
                                  
                                  <tr class="success">
                                    <td>Emergency Contact Number</td>
                                    <td>{{$adventureBooking->emergency_contact_number}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Your Flight Arrival Date</td>
                                    <td>{{$adventureBooking->flight_arrival_date}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Your Flight Departure Date</td>
                                    <td>{{$adventureBooking->flight_departure_date}}</td>
                                  </tr>
                                  <tr class="success">
                                    <td>Information</td>
                                    <td>{{$adventureBooking->information}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>No Of Participants</td>
                                    <td>{{$adventureBooking->number_of_person}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>Package Price (Per Person):</td>
                                    <td>{{$adventureBooking->package_price_per_person}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>Total Package Price</td>
                                    <td>{{$adventureBooking->total_price}}</td>
                                  </tr>

                                </tbody>
                              </table>

                            </div>
                        </div>
                    </div>

                </div>

                </form>
            </div>

@endsection
