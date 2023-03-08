<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourCostandDate;
use App\Models\TourPackage;

class TourCostandDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$tourpackage_id)
    {
        $details = TourPackage::findorfail($tourpackage_id)->tourcostanddate()->get();
      $d_id = $tourpackage_id;
      return view('admin.tour_package.tourcostanddate.create', compact('details', 'd_id'));
        
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
            'cad_day' => 'required',
            'cad_price' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
        $formData['upcoming_treks'] = is_null($request->upcoming_treks) ? 0 : 1;
          
  
          TourPackage::findorfail($tourpackage_id)->tourcostanddate()->create($formData);
          return redirect()->route('tourcostanddate.create', [$request->package])->with('message', 'Cost And Date Added Successfully.');
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
    public function edit($tourpackage_id, $tourcostanddate_id)
    {
       $tourcostanddate = TourPackage::findorfail($tourpackage_id)->tourcostanddate;
    //    dd($faq);
       $detail = TourCostandDate::findorfail($tourcostanddate_id);
       $d_id = $tourpackage_id;

       return view('admin.tour_package.tourcostanddate.edit', compact('tourcostanddate', 'detail', 'd_id'));
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
        'cad_day' => 'required',
        'cad_price' => 'required',
      ]);

      $formData = $request->all();
      
      $data = TourCostandDate::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      $formData['upcoming_treks'] = is_null($request->upcoming_treks) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('tourcostanddate.create', [$request->package])->with('message', 'Cost and Date Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tourpackage_id, $tourcostanddate_id)
    {
       $data = TourCostandDate::findorfail($tourcostanddate_id);

       $data->delete();
       return redirect()->route('tourcostanddate.create', [$tourpackage_id])->with('message', 'Cost and Date Deleted Successfully.');
    }
}