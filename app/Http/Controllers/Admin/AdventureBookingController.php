<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdventureBooking;
// use App\Models\AdminsRole;
use Auth;
use Session;

class AdventureBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = AdventureBooking::where('type','AdventurePackageBooking')->orderBy('created_at', 'desc')->get();
        return view('admin.adventure_booking.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = AdventureBooking::where('type','AdventurePackageInquire')->orderBy('created_at', 'desc')->get();
        // dd($details);
        return view('admin.adventure_booking.booking_inquery', compact('details'));
        
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
        $adventureBooking = AdventureBooking::findorfail($id);
        return view('admin.adventure_booking.details', compact('adventureBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adventureBookingInquire = AdventureBooking::findorfail($id);
        return view('admin.adventure_booking.adventure_inquire_details', compact('adventureBookingInquire'));
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
        $booking = AdventureBooking::findorfail($id);
        $booking->delete();
        return redirect()->back()->with('message', 'Tour Booking Deleted Successfully.');
    }
}