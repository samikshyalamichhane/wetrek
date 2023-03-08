<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackageEquipment;
use App\Models\Package;

class PackageEquipmentController extends Controller
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
        $details = Package::findorfail($package_id)->packageequipment()->take(5)->get();
        $d_id = $package_id;
        return view('admin.package.packageequipment.create', compact('details', 'd_id'));
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
            'title' => 'required',
            'description' => 'required',

          ]);
  
          $formData = $request->all();
          $formData['published'] = is_null($request->published) ? 0 : 1;

          Package::findorfail($package_id)->packageequipment()->create($formData);
          return redirect()->route('packageequipment.create', [$request->package])->with('message', 'Package Itinerary Added Successfully.');
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
    public function edit($package_id, $packageequipment_id)
    {
       $packageequipment = Package::findorfail($package_id)->packageequipment;
       $detail = PackageEquipment::findorfail($packageequipment_id);
       $d_id = $package_id;

       return view('admin.package.packageequipment.edit', compact('packageequipment', 'detail', 'd_id'));
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
        'title' => 'required',
        'description' => 'required',
      ]);

      $formData = $request->all();
      
      $data = PackageEquipment::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      
      $data->update($formData);
      
      return redirect()->route('packageequipment.create', [$request->package])->with('message', 'Package Equipment Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, $packageequipment_id)
    {
       $data = PackageEquipment::findorfail($packageequipment_id);

       $data->delete();
       return redirect()->route('packageequipment.create', [$package_id])->with('message', 'Package Equipment Deleted Successfully.');
    }
}
