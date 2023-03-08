@extends('admin.layouts.app')

@section('content')

<div class="page-content fade-in-up">

                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Tour Booking Details</div>

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
                                    <td>{{$tourBookingInquire->departure_date}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Full Name</td>
                                    <td>{{$tourBookingInquire->full_name}}</td>
                                  </tr>
                                  <tr class="success">
                                    <td>Email Address</td>
                                    <td>{{$tourBookingInquire->email}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>Country</td>
                                    <td>{{$tourBookingInquire->country}}</td>
                                  </tr>
                                  <tr class="danger">
                                    <td>Package</td>
                                    <td>{{@$tourBookingInquire->tourpackage->package_name}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Contact Number</td>
                                    <td>{{$tourBookingInquire->contact_no}}</td>
                                  {{-- </tr>$tourBookingInquire->flight_departure_date}}</td> --}}
                                  </tr>
                                  <tr class="success">
                                    <td>Information</td>
                                    <td>{{$tourBookingInquire->information}}</td>
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
