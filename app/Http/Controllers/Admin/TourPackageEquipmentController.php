<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourPackageEquipment;
use App\Models\TourPackage;

class TourPackageEquipmentController extends Controller
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
        $details = TourPackage::findorfail($tourpackage_id)->tourpackageequipment()->take(5)->get();
        $d_id = $tourpackage_id;
        return view('admin.tour_package.tourpackageequipment.create', compact('details', 'd_id'));
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
            'title' => 'required',
            'description' => 'required',

          ]);
  
          $formData = $request->all();
          $formData['published'] = is_null($request->published) ? 0 : 1;

          TourPackage::findorfail($tourpackage_id)->tourpackageequipment()->create($formData);
          return redirect()->route('tourpackageequipment.create', [$request->package])->with('message', 'TourPackage Itinerary Added Successfully.');
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
    public function edit($tourpackage_id, $tourpackageequipment_id)
    {
       $tourpackageequipment = TourPackage::findorfail($tourpackage_id)->tourpackageequipment;
       $detail = TourPackageEquipment::findorfail($tourpackageequipment_id);
       $d_id = $tourpackage_id;

       return view('admin.tour_package.tourpackageequipment.edit', compact('tourpackageequipment', 'detail', 'd_id'));
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
        'title' => 'required',
        'description' => 'required',
      ]);

      $formData = $request->all();
      
      $data = TourPackageEquipment::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      
      $data->update($formData);
      
      return redirect()->route('tourpackageequipment.create', [$request->package])->with('message', 'TourPackage Equipment Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tourpackage_id, $tourpackageequipment_id)
    {
       $data = TourPackageEquipment::findorfail($tourpackageequipment_id);

       $data->delete();
       return redirect()->route('tourpackageequipment.create', [$tourpackage_id])->with('message', 'TourPackage Equipment Deleted Successfully.');
    }
}
