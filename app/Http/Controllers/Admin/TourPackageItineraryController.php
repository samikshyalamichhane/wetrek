<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourPackageItinerary;
use App\Models\TourPackage;

class TourPackageItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort('404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $tourpackage_id)
    {
        $details = TourPackage::findorfail($tourpackage_id)->tourpackageitinerary()->orderBy('order_row')->get();
        $d_id = $tourpackage_id;
        return view('admin.tour_package.tourpackageitinerary.create', compact('details', 'd_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $tourpackage_id)
    {
        $request->validate([
            'day_num' => 'required',
            'title' => 'required',
          ]);
  
          $formData = $request->all();
  
          TourPackage::findorfail($tourpackage_id)->tourpackageitinerary()->create($formData);
          return redirect()->route('tourpackageitinerary.create', [$request->package])->with('message', 'Tour Package Itinerary Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tourpackage_id, $tourpackageitinerary_id)
    {
       $tourpackageitinerary = TourPackage::findorfail($tourpackage_id)->tourpackageitinerary;
       $detail = TourPackageItinerary::findorfail($tourpackageitinerary_id);
       $d_id = $tourpackage_id;

       return view('admin.tour_package.tourpackageitinerary.edit', compact('tourpackageitinerary', 'detail', 'd_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tourpackage_id, $id)
    {
       $request->validate([
        'day_num' => 'required',
        'title' => 'required',
      ]);

      $formData = $request->all();
      
      $data = TourPackageItinerary::findorfail($id);
      
      $data->update($formData);
      
      return redirect()->route('tourpackageitinerary.create', [$request->package])->with('message', 'TourPackage Itinerary Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function updateOrder(Request $request){
        // dd('Hello');
        $data =[];
        foreach($request->data as $row){
            TourPackageItinerary::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }
    
    public function destroy($tourpackage_id, $tourpackageitinerary_id)
    {
       $data = TourPackageItinerary::findorfail($tourpackageitinerary_id);

       $data->delete();
       return redirect()->route('tourpackageitinerary.create', [$tourpackage_id])->with('message', 'TourPackage Itinerary Deleted Successfully.');
    }
}