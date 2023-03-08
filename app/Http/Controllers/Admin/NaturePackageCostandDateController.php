<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NaturePackageCostandDate;
use App\Models\NaturePackage;

class NaturePackageCostandDateController extends Controller
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
  public function create(Request $request,$naturepackage_id)
  {
      $details = NaturePackage::findorfail($naturepackage_id)->naturepackagecostanddate()->get();
    $d_id = $naturepackage_id;
    return view('admin.nature_package.naturepackagecostanddate.create', compact('details', 'd_id'));
      
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request,$naturepackage_id)
  {
      $request->validate([
          'cad_day' => 'required',
          'cad_price' => 'required',
        ]);

        $formData = $request->all();
      $formData['published'] = is_null($request->published) ? 0 : 1;
      $formData['upcoming_treks'] = is_null($request->upcoming_treks) ? 0 : 1;
        

        NaturePackage::findorfail($naturepackage_id)->naturepackagecostanddate()->create($formData);
        return redirect()->route('naturepackagecostanddate.create', [$request->package])->with('message', 'Cost And Date Added Successfully.');
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
  public function edit($naturepackage_id, $naturepackagecostanddate_id)
  {
     $naturepackagecostanddate = NaturePackage::findorfail($naturepackage_id)->naturepackagecostanddate;
  //    dd($faq);
     $detail = NaturePackageCostandDate::findorfail($naturepackagecostanddate_id);
     $d_id = $naturepackage_id;

     return view('admin.nature_package.naturepackagecostanddate.edit', compact('naturepackagecostanddate', 'detail', 'd_id'));
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
      'cad_day' => 'required',
      'cad_price' => 'required',
    ]);

    $formData = $request->all();
    
    $data = NaturePackageCostandDate::findorfail($id);
    $formData['published'] = is_null($request->published) ? 0 : 1;
    $formData['upcoming_treks'] = is_null($request->upcoming_treks) ? 0 : 1;

    
    $data->update($formData);
    
    return redirect()->route('naturepackagecostanddate.create', [$request->package])->with('message', 'Cost and Date Edited Successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($naturepackage_id, $naturepackagecostanddate_id)
  {
     $data = NaturePackageCostandDate::findorfail($naturepackagecostanddate_id);

     $data->delete();
     return redirect()->route('naturepackagecostanddate.create', [$naturepackage_id])->with('message', 'Cost and Date Deleted Successfully.');
  }
}
