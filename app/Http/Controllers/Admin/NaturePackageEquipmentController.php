<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NaturePackageEquipment;
use App\Models\NaturePackage;

class NaturePackageEquipmentController extends Controller
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
        $details = NaturePackage::findorfail($naturepackage_id)->naturepackageequipment()->take(5)->get();
        $d_id = $naturepackage_id;
        return view('admin.nature_package.naturepackageequipment.create', compact('details', 'd_id'));
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
            'title' => 'required',
            'description' => 'required',

          ]);
  
          $formData = $request->all();
          $formData['published'] = is_null($request->published) ? 0 : 1;

          NaturePackage::findorfail($naturepackage_id)->naturepackageequipment()->create($formData);
          return redirect()->route('naturepackageequipment.create', [$request->package])->with('message', 'Nature & Wildlife Package Itinerary Added Successfully.');
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
    public function edit($naturepackage_id, $naturepackageequipment_id)
    {
       $naturepackageequipment = NaturePackage::findorfail($naturepackage_id)->naturepackageequipment;
       $detail = NaturePackageEquipment::findorfail($naturepackageequipment_id);
       $d_id = $naturepackage_id;

       return view('admin.nature_package.naturepackageequipment.edit', compact('naturepackageequipment', 'detail', 'd_id'));
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
        'title' => 'required',
        'description' => 'required',
      ]);

      $formData = $request->all();
      
      $data = NaturePackageEquipment::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      
      $data->update($formData);
      
      return redirect()->route('naturepackageequipment.create', [$request->package])->with('message', 'Nature & Wildlife Package Equipment Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($naturepackage_id, $naturepackageequipment_id)
    {
       $data = NaturePackageEquipment::findorfail($naturepackageequipment_id);

       $data->delete();
       return redirect()->route('naturepackageequipment.create', [$naturepackage_id])->with('message', 'Nature & Wildlife Package Equipment Deleted Successfully.');
    }
}

