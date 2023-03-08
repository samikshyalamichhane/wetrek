<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelitourCostandDate;
use App\Models\HelitourPackage;

class HelitourCostandDateController extends Controller
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
    public function create(Request $request,$helitourpackage_id)
    {
        $details = HelitourPackage::findorfail($helitourpackage_id)->helitourcostanddate()->get();
      $d_id = $helitourpackage_id;
      return view('admin.helitour_package.helitourcostanddate.create', compact('details', 'd_id'));
        
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
            'cad_day' => 'required',
            'cad_price' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
        $formData['upcoming_treks'] = is_null($request->upcoming_treks) ? 0 : 1;
          
  
          HelitourPackage::findorfail($helitourpackage_id)->helitourcostanddate()->create($formData);
          return redirect()->route('helitourcostanddate.create', [$request->package])->with('message', 'Cost and Date Added Successfully.');
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
    public function edit($helitourpackage_id, $helitourcostanddate_id)
    {
       $helitourcostanddate = HelitourPackage::findorfail($helitourpackage_id)->helitourcostanddate;
    //    dd($faq);
       $detail = HelitourCostandDate::findorfail($helitourcostanddate_id);
       $d_id = $helitourpackage_id;

       return view('admin.helitour_package.helitourcostanddate.edit', compact('helitourcostanddate', 'detail', 'd_id'));
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
        'cad_day' => 'required',
        'cad_price' => 'required',
      ]);

      $formData = $request->all();
      
      $data = HelitourCostandDate::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      $formData['upcoming_treks'] = is_null($request->upcoming_treks) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('helitourcostanddate.create', [$request->package])->with('message', 'Cost and Date Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($helitourpackage_id, $helitourcostanddate_id)
    {
       $data = HelitourCostandDate::findorfail($helitourcostanddate_id);

       $data->delete();
       return redirect()->route('helitourcostanddate.create', [$helitourpackage_id])->with('message', 'Cost and Date Deleted Successfully.');
    }
}
