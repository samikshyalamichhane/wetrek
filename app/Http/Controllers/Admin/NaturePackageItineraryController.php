<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NaturePackageItinerary;
use App\Models\NaturePackage;

class NaturePackageItineraryController extends Controller
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
    public function create(Request $request, $naturepackage_id)
    {
        $details = NaturePackage::findorfail($naturepackage_id)->naturepackageitinerary()->orderBy('order_row')->get();
        $d_id = $naturepackage_id;
        return view('admin.nature_package.naturepackageitinerary.create', compact('details', 'd_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $naturepackage_id)
    {
        $request->validate([
            'day_num' => 'required',
            'title' => 'required',
          ]);
  
          $formData = $request->all();
  
          NaturePackage::findorfail($naturepackage_id)->naturepackageitinerary()->create($formData);
          return redirect()->route('naturepackageitinerary.create', [$request->package])->with('message', 'Nature & Wildlife Package Itinerary Added Successfully.');
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
    public function edit($naturepackage_id, $naturepackageitinerary_id)
    {
       $naturepackageitinerary = NaturePackage::findorfail($naturepackage_id)->naturepackageitinerary;
       $detail = NaturePackageItinerary::findorfail($naturepackageitinerary_id);
       $d_id = $naturepackage_id;

       return view('admin.nature_package.naturepackageitinerary.edit', compact('naturepackageitinerary', 'detail', 'd_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $naturepackage_id, $id)
    {
       $request->validate([
        'day_num' => 'required',
        'title' => 'required',
      ]);

      $formData = $request->all();
      
      $data = NaturePackageItinerary::findorfail($id);
      
      $data->update($formData);
      
      return redirect()->route('naturepackageitinerary.create', [$request->package])->with('message', 'NaturePackage Itinerary Edited Successfully.');
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
            NaturePackageItinerary::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }
    public function destroy($naturepackage_id, $naturepackageitinerary_id)
    {
       $data = NaturePackageItinerary::findorfail($naturepackageitinerary_id);

       $data->delete();
       return redirect()->route('naturepackageitinerary.create', [$naturepackage_id])->with('message', 'NaturePackage Itinerary Deleted Successfully.');
    }
}
