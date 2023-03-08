<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackageItinerary;
use App\Models\Package;

class PackageItineraryController extends Controller
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
    public function create(Request $request, $package_id)
    {
        $details = Package::findorfail($package_id)->packageitinerary()->orderBy('order_row')->get();
        $d_id = $package_id;
        return view('admin.package.packageitinerary.create', compact('details', 'd_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $package_id)
    {
        $request->validate([
            'day_num' => 'nullable',
            'title' => 'nullable',
          ]);
  
          $formData = $request->all();
  
          Package::findorfail($package_id)->packageitinerary()->create($formData);
          return redirect()->route('packageitinerary.create', [$request->package])->with('message', 'Package Itinerary Added Successfully.');
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
    public function edit($package_id, $packageitinerary_id)
    {
       $packageitinerary = Package::findorfail($package_id)->packageitinerary;
       $detail = PackageItinerary::findorfail($packageitinerary_id);
       $d_id = $package_id;

       return view('admin.package.packageitinerary.edit', compact('packageitinerary', 'detail', 'd_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $package_id, $id)
    {
       $request->validate([
        'day_num' => 'nullable',
        'title' => 'nullable',
      ]);

      $formData = $request->all();
      
      $data = PackageItinerary::findorfail($id);
      
      $data->update($formData);
      
      return redirect()->route('packageitinerary.create', [$request->package])->with('message', 'Package Itinerary Edited Successfully.');
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
            PackageItinerary::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }
    
    
    public function destroy($package_id, $packageitinerary_id)
    {
       $data = PackageItinerary::findorfail($packageitinerary_id);

       $data->delete();
       return redirect()->route('packageitinerary.create', [$package_id])->with('message', 'Package Itinerary Deleted Successfully.');
    }
}
