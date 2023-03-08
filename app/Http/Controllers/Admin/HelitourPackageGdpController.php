<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelitourPackageGdp;
use App\Models\HelitourPackage;

class HelitourPackageGdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helitourpackagegdp = HelitourPackageGdp::get();
        // $helitourpackagegdp = HelitourPackageGdp::published()->get();
        return view('admin.helitourpackagegdp.list',compact('helitourpackagegdp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$helitourpackage_id)
    {
        $details = HelitourPackage::findorfail($helitourpackage_id)->helitourpackagegdp()->take(12)->get();
      $d_id = $helitourpackage_id;
      return view('admin.helitour_package.helitourpackagegdp.create', compact('details', 'd_id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$helitourpackage_id)
    {
        $request->validate([
            'no_of_persons' => 'required',
            'price_per_person' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          HelitourPackage::findorfail($helitourpackage_id)->helitourpackagegdp()->create($formData);
          return redirect()->route('helitourpackagegdp.create', [$request->package])->with('message', 'Heli Tour Package Group Discount Price Added Successfully.');
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
    public function edit($helitourpackage_id, $helitourpackagegdp_id)
    {
       $helitourpackagegdp = HelitourPackage::findorfail($helitourpackage_id)->helitourpackagegdp;
    //    dd($helitourpackagegdp);
       $detail = HelitourPackageGdp::findorfail($helitourpackagegdp_id);
       $d_id = $helitourpackage_id;

       return view('admin.helitour_package.helitourpackagegdp.edit', compact('helitourpackagegdp', 'detail', 'd_id'));
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
        'no_of_persons' => 'required',
        'price_per_person' => 'required',
      ]);

      $formData = $request->all();
      
      $data = HelitourPackageGdp::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('helitourpackagegdp.create', [$request->package])->with('message', 'Heli Tour Package Group Discount Price Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($helitourpackage_id, $helitourpackagegdp_id)
    {
       $data = HelitourPackageGdp::findorfail($helitourpackagegdp_id);

       $data->delete();
       return redirect()->route('helitourpackagegdp.create', [$helitourpackage_id])->with('message', 'Heli Tour Package Group Discount Price Deleted Successfully.');
    }
}