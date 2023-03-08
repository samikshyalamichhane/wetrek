<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdventurePackageEquipment;
use App\Models\AdventurePackage;

class AdventurePackageEquipmentController extends Controller
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
        $details = AdventurePackage::findorfail($adventurepackage_id)->adventurepackageequipment()->take(5)->get();
        $d_id = $adventurepackage_id;
        return view('admin.adventure_package.adventurepackageequipment.create', compact('details', 'd_id'));
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
            'title' => 'required',
            'description' => 'required',

          ]);
  
          $formData = $request->all();
          $formData['published'] = is_null($request->published) ? 0 : 1;

          AdventurePackage::findorfail($adventurepackage_id)->adventurepackageequipment()->create($formData);
          return redirect()->route('adventurepackageequipment.create', [$request->package])->with('message', 'AdventurePackage Itinerary Added Successfully.');
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
    public function edit($adventurepackage_id, $adventurepackageequipment_id)
    {
       $adventurepackageequipment = AdventurePackage::findorfail($adventurepackage_id)->adventurepackageequipment;
       $detail = AdventurePackageEquipment::findorfail($adventurepackageequipment_id);
       $d_id = $adventurepackage_id;

       return view('admin.adventure_package.adventurepackageequipment.edit', compact('adventurepackageequipment', 'detail', 'd_id'));
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
        'title' => 'required',
        'description' => 'required',
      ]);

      $formData = $request->all();
      
      $data = AdventurePackageEquipment::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      
      $data->update($formData);
      
      return redirect()->route('adventurepackageequipment.create', [$request->package])->with('message', 'Adventure Package Equipment Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adventurepackage_id, $adventurepackageequipment_id)
    {
       $data = AdventurePackageEquipment::findorfail($adventurepackageequipment_id);

       $data->delete();
       return redirect()->route('adventurepackageequipment.create', [$adventurepackage_id])->with('message', 'Adventure Package Equipment Deleted Successfully.');
    }
}
