<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourPackageGdp;
use App\Models\TourPackage;

class TourPackageGdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourpackagegdp = TourPackageGdp::get();
        // $tourpackagegdp = TourPackageGdp::published()->get();
        return view('admin.tourpackagegdp.list',compact('tourpackagegdp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$tourpackage_id)
    {
        $details = TourPackage::findorfail($tourpackage_id)->tourpackagegdp()->take(7)->get();
      $d_id = $tourpackage_id;
      return view('admin.tour_package.tourpackagegdp.create', compact('details', 'd_id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$tourpackage_id)
    {
        $request->validate([
            'no_of_persons' => 'required',
            'price_per_person' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          TourPackage::findorfail($tourpackage_id)->tourpackagegdp()->create($formData);
          return redirect()->route('tourpackagegdp.create', [$request->package])->with('message', 'Tour Package Group Discount Price Added Successfully.');
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
    public function edit($tourpackage_id, $tourpackagegdp_id)
    {
       $tourpackagegdp = TourPackage::findorfail($tourpackage_id)->tourpackagegdp;
    //    dd($tourpackagegdp);
       $detail = TourPackageGdp::findorfail($tourpackagegdp_id);
       $d_id = $tourpackage_id;

       return view('admin.tour_package.tourpackagegdp.edit', compact('tourpackagegdp', 'detail', 'd_id'));
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
        'no_of_persons' => 'required',
        'price_per_person' => 'required',
      ]);

      $formData = $request->all();
      
      $data = TourPackageGdp::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('tourpackagegdp.create', [$request->package])->with('message', 'Tour Package Group Discount Price Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tourpackage_id, $tourpackagegdp_id)
    {
       $data = TourPackageGdp::findorfail($tourpackagegdp_id);

       $data->delete();
       return redirect()->route('tourpackagegdp.create', [$tourpackage_id])->with('message', 'Tour Package Group Discount Price Deleted Successfully.');
    }
}
