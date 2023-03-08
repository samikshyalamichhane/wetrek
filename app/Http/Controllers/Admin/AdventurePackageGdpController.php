<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdventurePackageGdp;
use App\Models\AdventurePackage;

class AdventurePackageGdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adventurepackagegdp = AdventurePackageGdp::get();
        // $adventurepackagegdp = AdventurePackageGdp::published()->get();
        return view('admin.adventurepackagegdp.list',compact('adventurepackagegdp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$adventurepackage_id)
    {
        $details = AdventurePackage::findorfail($adventurepackage_id)->adventurepackagegdp()->take(7)->get();
      $d_id = $adventurepackage_id;
      return view('admin.adventure_package.adventurepackagegdp.create', compact('details', 'd_id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$adventurepackage_id)
    {
        $request->validate([
            'no_of_persons' => 'required',
            'price_per_person' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          AdventurePackage::findorfail($adventurepackage_id)->adventurepackagegdp()->create($formData);
          return redirect()->route('adventurepackagegdp.create', [$request->package])->with('message', 'Adventure Package Group Discount Price Added Successfully.');
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
    public function edit($adventurepackage_id, $adventurepackagegdp_id)
    {
       $adventurepackagegdp = AdventurePackage::findorfail($adventurepackage_id)->adventurepackagegdp;
    //    dd($adventurepackagegdp);
       $detail = AdventurePackageGdp::findorfail($adventurepackagegdp_id);
       $d_id = $adventurepackage_id;

       return view('admin.adventure_package.adventurepackagegdp.edit', compact('adventurepackagegdp', 'detail', 'd_id'));
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
        'no_of_persons' => 'required',
        'price_per_person' => 'required',
      ]);

      $formData = $request->all();
      
      $data = AdventurePackageGdp::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('adventurepackagegdp.create', [$request->package])->with('message', 'Adventure Package Group Discount Price Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adventurepackage_id, $adventurepackagegdp_id)
    {
       $data = AdventurePackageGdp::findorfail($adventurepackagegdp_id);

       $data->delete();
       return redirect()->route('adventurepackagegdp.create', [$adventurepackage_id])->with('message', 'Adventure Package Group Discount Price Deleted Successfully.');
    }
}
