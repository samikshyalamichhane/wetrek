<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NatureBooking;
// use App\Models\AdminsRole;
use Auth;
use Session;

class NatureBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = NatureBooking::where('type','NaturePackageBooking')->orderBy('created_at', 'desc')->get();
        return view('admin.nature_booking.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = NatureBooking::where('type','NaturePackageInquire')->orderBy('created_at', 'desc')->get();
        // dd($details);
        return view('admin.nature_booking.booking_inquery', compact('details'));
        
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
        $natureBooking = NatureBooking::findorfail($id);
        return view('admin.nature_booking.details', compact('natureBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $natureBookingInquire = NatureBooking::findorfail($id);
        return view('admin.nature_booking.nature_inquire_details', compact('natureBookingInquire'));
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
        $booking = NatureBooking::findorfail($id);
        $booking->delete();
        return redirect()->back()->with('message', 'Tour Booking Deleted Successfully.');
    }
}