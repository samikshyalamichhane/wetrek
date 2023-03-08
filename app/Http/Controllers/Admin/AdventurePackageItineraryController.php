<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdventurePackageItinerary;
use App\Models\AdventurePackage;

class AdventurePackageItineraryController extends Controller
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
    public function create(Request $request, $adventurepackage_id)
    {
        $details = AdventurePackage::findorfail($adventurepackage_id)->adventurepackageitinerary()->orderBy('order_row')->get();
        $d_id = $adventurepackage_id;
        return view('admin.adventure_package.adventurepackageitinerary.create', compact('details', 'd_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $adventurepackage_id)
    {
        $request->validate([
            'day_num' => 'required',
            'title' => 'required',
          ]);
  
          $formData = $request->all();
  
          AdventurePackage::findorfail($adventurepackage_id)->adventurepackageitinerary()->create($formData);
          return redirect()->route('adventurepackageitinerary.create', [$request->package])->with('message', 'Adventure Package Itinerary Added Successfully.');
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
    public function edit($adventurepackage_id, $adventurepackageitinerary_id)
    {
       $adventurepackageitinerary = AdventurePackage::findorfail($adventurepackage_id)->adventurepackageitinerary;
       $detail = AdventurePackageItinerary::findorfail($adventurepackageitinerary_id);
       $d_id = $adventurepackage_id;

       return view('admin.adventure_package.adventurepackageitinerary.edit', compact('adventurepackageitinerary', 'detail', 'd_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adventurepackage_id, $id)
    {
       $request->validate([
        'day_num' => 'required',
        'title' => 'required',
      ]);

      $formData = $request->all();
      
      $data = AdventurePackageItinerary::findorfail($id);
      
      $data->update($formData);
      
      return redirect()->route('adventurepackageitinerary.create', [$request->package])->with('message', 'AdventurePackage Itinerary Edited Successfully.');
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
            AdventurePackageItinerary::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }
    
    public function destroy($adventurepackage_id, $adventurepackageitinerary_id)
    {
       $data = AdventurePackageItinerary::findorfail($adventurepackageitinerary_id);

       $data->delete();
       return redirect()->route('adventurepackageitinerary.create', [$adventurepackage_id])->with('message', 'AdventurePackage Itinerary Deleted Successfully.');
    }
}