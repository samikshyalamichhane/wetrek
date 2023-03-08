<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourBooking;
// use App\Models\AdminsRole;
use Auth;
use Session;

class TourBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = TourBooking::with('tourcostanddate')->where('type','TourPackageBooking')->orderBy('created_at', 'desc')->get();
        return view('admin.tour_booking.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = TourBooking::where('type','TourPackageInquire')->orderBy('created_at', 'desc')->get();
        // dd($details);
        return view('admin.tour_booking.booking_inquery', compact('details'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tourBooking = TourBooking::findorfail($id);
        return view('admin.tour_booking.details', compact('tourBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tourBookingInquire = TourBooking::findorfail($id);
        return view('admin.tour_booking.tour_inquire_details', compact('tourBookingInquire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = TourBooking::findorfail($id);
        $booking->delete();
        return redirect()->back()->with('message', 'Tour Booking Deleted Successfully.');
    }
}