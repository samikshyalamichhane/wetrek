@extends('admin.layouts.app')

@section('content')

<div class="page-content fade-in-up">

                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Booking Details</div>

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
                                    <td>{{$trekkingandhikingBookingInquiry->departure_date}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Full Name</td>
                                    <td>{{$trekkingandhikingBookingInquiry->full_name}}</td>
                                  </tr>
                                  <tr class="success">
                                    <td>Email Address</td>
                                    <td>{{$trekkingandhikingBookingInquiry->email}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>Country</td>
                                    <td>{{$trekkingandhikingBookingInquiry->country}}</td>
                                  </tr>
                                  <tr class="danger">
                                    <td>Package</td>
                                    <td>{{@$trekkingandhikingBookingInquiry->package->package_name}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Contact Number</td>
                                    <td>{{$trekkingandhikingBookingInquiry->contact_no}}</td>
                                  </tr>
                                  <tr class="success">
                                    <td>Information</td>
                                    <td>{{$trekkingandhikingBookingInquiry->information}}</td>
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
