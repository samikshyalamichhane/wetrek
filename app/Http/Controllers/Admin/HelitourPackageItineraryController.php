<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelitourPackageItinerary;
use App\Models\HelitourPackage;

class HelitourPackageItineraryController extends Controller
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
    public function create(Request $request, $helitourpackage_id)
    {
        $details = HelitourPackage::findorfail($helitourpackage_id)->helitourpackageitinerary()->orderBy('order_row')->get();
        $d_id = $helitourpackage_id;
        return view('admin.helitour_package.helitourpackageitinerary.create', compact('details', 'd_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $helitourpackage_id)
    {
        $request->validate([
            'day_num' => 'required',
            'title' => 'required',
          ]);
  
          $formData = $request->all();
  
          HelitourPackage::findorfail($helitourpackage_id)->helitourpackageitinerary()->create($formData);
          return redirect()->route('helitourpackageitinerary.create', [$request->package])->with('message', 'Heli Tour Package Itinerary Added Successfully.');
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
    public function edit($helitourpackage_id, $helitourpackageitinerary_id)
    {
       $helitourpackageitinerary = HelitourPackage::findorfail($helitourpackage_id)->helitourpackageitinerary;
       $detail = HelitourPackageItinerary::findorfail($helitourpackageitinerary_id);
       $d_id = $helitourpackage_id;

       return view('admin.helitour_package.helitourpackageitinerary.edit', compact('helitourpackageitinerary', 'detail', 'd_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $helitourpackage_id, $id)
    {
       $request->validate([
        'day_num' => 'required',
        'title' => 'required',
      ]);

      $formData = $request->all();
      
      $data = HelitourPackageItinerary::findorfail($id);
      
      $data->update($formData);
      
      return redirect()->route('helitourpackageitinerary.create', [$request->package])->with('message', 'Heli Tour Package Itinerary Edited Successfully.');
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
            HelitourPackageItinerary::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }
    
    public function destroy($helitourpackage_id, $helitourpackageitinerary_id)
    {
       $data = HelitourPackageItinerary::findorfail($helitourpackageitinerary_id);

       $data->delete();
       return redirect()->route('helitourpackageitinerary.create', [$helitourpackage_id])->with('message', 'Heli Tour Package Itinerary Deleted Successfully.');
    }
}
