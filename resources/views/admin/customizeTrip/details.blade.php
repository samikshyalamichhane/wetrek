@extends('admin.layouts.app')

@section('content')

<div class="page-content fade-in-up">

                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Customize Trip Details</div>

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
                                    <td>Name</td>
                                    <td>{{$customizeTripDetails->name}}</td>
                                  </tr>
                                  <tr class="success">
                                    <td>Email Address</td>
                                    <td>{{$customizeTripDetails->email}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>Country</td>
                                    <td>{{$customizeTripDetails->country}}</td>
                                  </tr>
                                  <tr class="danger">
                                    <td>Package</td>
                                    <td>{{$customizeTripDetails->package_name}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Contact Number</td>
                                    <td>{{$customizeTripDetails->contact_no}}</td>
                                  </tr>
                                  
                                  <tr class="success">
                                    <td>Accommodation Category</td>
                                    <td>{{$customizeTripDetails->accommodation_category}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>Number of Participants</td>
                                    <td>{{$customizeTripDetails->no_of_person}}</td>
                                  </tr>
                                  
                                  <tr class="info">
                                    <td>Duration OFF Stay</td>
                                    <td>{{$customizeTripDetails->duration_of_stay}}</td>
                                  </tr>
                                  <tr class="info">
                                    <td>Arrival Date</td>
                                    <td>{{$customizeTripDetails->arrival_date}}</td>
                                  </tr>
                                  <tr class="success">
                                    <td>Additional Requirement</td>
                                    <td>{{$customizeTripDetails->additional_requirement}}</td>
                                  </tr>
                                  <tr class="warning">
                                    <td>type</td>
                                    <td>{{$customizeTripDetails->type}}</td>
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
