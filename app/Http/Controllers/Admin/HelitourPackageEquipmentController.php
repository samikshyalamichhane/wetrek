<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelitourPackageEquipment;
use App\Models\HelitourPackage;

class HelitourPackageEquipmentController extends Controller
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
        $details = HelitourPackage::findorfail($helitourpackage_id)->helitourpackageequipment()->take(5)->get();
        $d_id = $helitourpackage_id;
        return view('admin.helitour_package.helitourpackageequipment.create', compact('details', 'd_id'));
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
            'title' => 'required',
            'description' => 'required',

          ]);
  
          $formData = $request->all();
          $formData['published'] = is_null($request->published) ? 0 : 1;

          HelitourPackage::findorfail($helitourpackage_id)->helitourpackageequipment()->create($formData);
          return redirect()->route('helitourpackageequipment.create', [$request->package])->with('message', 'Heli Tour Package Itinerary Added Successfully.');
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
    public function edit($helitourpackage_id, $helitourpackageequipment_id)
    {
       $helitourpackageequipment = HelitourPackage::findorfail($helitourpackage_id)->helitourpackageequipment;
       $detail = HelitourPackageEquipment::findorfail($helitourpackageequipment_id);
       $d_id = $helitourpackage_id;

       return view('admin.helitour_package.helitourpackageequipment.edit', compact('helitourpackageequipment', 'detail', 'd_id'));
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
        'title' => 'required',
        'description' => 'required',
      ]);

      $formData = $request->all();
      
      $data = HelitourPackageEquipment::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      
      $data->update($formData);
      
      return redirect()->route('helitourpackageequipment.create', [$request->package])->with('message', 'Heli Tour Package Equipment Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($helitourpackage_id, $helitourpackageequipment_id)
    {
       $data = HelitourPackageEquipment::findorfail($helitourpackageequipment_id);

       $data->delete();
       return redirect()->route('helitourpackageequipment.create', [$helitourpackage_id])->with('message', 'HelitourPackage Equipment Deleted Successfully.');
    }
}

