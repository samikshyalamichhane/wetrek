<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdventurePackageCostandDate;
use App\Models\AdventurePackage;

class AdventurePackageCostandDateController extends Controller
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
    public function create(Request $request,$adventurepackage_id)
    {
        $details = AdventurePackage::findorfail($adventurepackage_id)->adventurepackagecostanddate()->get();
      $d_id = $adventurepackage_id;
      return view('admin.adventure_package.adventurepackagecostanddate.create', compact('details', 'd_id'));
        
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
            'cad_day' => 'required',
            'cad_price' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
        $formData['upcoming_treks'] = is_null($request->upcoming_treks) ? 0 : 1;
          
  
          AdventurePackage::findorfail($adventurepackage_id)->adventurepackagecostanddate()->create($formData);
          return redirect()->route('adventurepackagecostanddate.create', [$request->package])->with('message', 'Cost And Date Added Successfully.');
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
    public function edit($adventurepackage_id, $adventurepackagecostanddate_id)
    {
       $adventurepackagecostanddate = AdventurePackage::findorfail($adventurepackage_id)->adventurepackagecostanddate;
    //    dd($faq);
       $detail = AdventurePackageCostandDate::findorfail($adventurepackagecostanddate_id);
       $d_id = $adventurepackage_id;

       return view('admin.adventure_package.adventurepackagecostanddate.edit', compact('adventurepackagecostanddate', 'detail', 'd_id'));
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
        'cad_day' => 'required',
        'cad_price' => 'required',
      ]);

      $formData = $request->all();
      
      $data = AdventurePackageCostandDate::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      $formData['upcoming_treks'] = is_null($request->upcoming_treks) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('adventurepackagecostanddate.create', [$request->package])->with('message', 'Cost and Date Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adventurepackage_id, $adventurepackagecostanddate_id)
    {
       $data = AdventurePackageCostandDate::findorfail($adventurepackagecostanddate_id);

       $data->delete();
       return redirect()->route('adventurepackagecostanddate.create', [$adventurepackage_id])->with('message', 'Cost and Date Deleted Successfully.');
    }
}
