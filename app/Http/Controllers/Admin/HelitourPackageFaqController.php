<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelitourPackageFaq;
use App\Models\HelitourPackage;

class HelitourPackageFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helitourpackagefaq = HelitourPackageFaq::get();
        // $helitourpackagefaq = HelitourPackageFaq::published()->get();
        return view('admin.helitourpackagefaq.list',compact('helitourpackagefaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$helitourpackage_id)
    {
        $details = HelitourPackage::findorfail($helitourpackage_id)->helitourpackagefaq()->take(7)->get();
      $d_id = $helitourpackage_id;
      return view('admin.helitour_package.helitourpackagefaq.create', compact('details', 'd_id'));
        
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
            'questions' => 'required',
            'answers' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          HelitourPackage::findorfail($helitourpackage_id)->helitourpackagefaq()->create($formData);
          return redirect()->route('helitourpackagefaq.create', [$request->package])->with('message', 'FAQ Added Successfully.');
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
    public function edit($helitourpackage_id, $helitourpackagefaq_id)
    {
       $helitourpackagefaq = HelitourPackage::findorfail($helitourpackage_id)->helitourpackagefaq;
    //    dd($helitourpackagefaq);
       $detail = HelitourPackageFaq::findorfail($helitourpackagefaq_id);
       $d_id = $helitourpackage_id;

       return view('admin.helitour_package.helitourpackagefaq.edit', compact('helitourpackagefaq', 'detail', 'd_id'));
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
        'questions' => 'required',
        'answers' => 'required',
      ]);

      $formData = $request->all();
      
      $data = HelitourPackageFaq::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('helitourpackagefaq.create', [$request->package])->with('message', 'Heli Tour Package Faq Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($helitourpackage_id, $helitourpackagefaq_id)
    {
       $data = HelitourPackageFaq::findorfail($helitourpackagefaq_id);

       $data->delete();
       return redirect()->route('helitourpackagefaq.create', [$helitourpackage_id])->with('message', 'HelitourPackageFaq Deleted Successfully.');
    }
}
