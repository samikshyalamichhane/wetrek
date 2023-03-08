<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourPackageFaq;
use App\Models\TourPackage;

class TourPackageFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourpackagefaq = TourPackageFaq::get();
        // $tourpackagefaq = TourPackageFaq::published()->get();
        return view('admin.tourpackagefaq.list',compact('tourpackagefaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$tourpackage_id)
    {
        $details = TourPackage::findorfail($tourpackage_id)->tourpackagefaq()->take(7)->get();
      $d_id = $tourpackage_id;
      return view('admin.tour_package.tourpackagefaq.create', compact('details', 'd_id'));
        
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
            'questions' => 'required',
            'answers' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          TourPackage::findorfail($tourpackage_id)->tourpackagefaq()->create($formData);
          return redirect()->route('tourpackagefaq.create', [$request->package])->with('message', 'FAQ Added Successfully.');
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
    public function edit($tourpackage_id, $tourpackagefaq_id)
    {
       $tourpackagefaq = TourPackage::findorfail($tourpackage_id)->tourpackagefaq;
    //    dd($tourpackagefaq);
       $detail = TourPackageFaq::findorfail($tourpackagefaq_id);
       $d_id = $tourpackage_id;

       return view('admin.tour_package.tourpackagefaq.edit', compact('tourpackagefaq', 'detail', 'd_id'));
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
        'questions' => 'required',
        'answers' => 'required',
      ]);

      $formData = $request->all();
      
      $data = TourPackageFaq::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('tourpackagefaq.create', [$request->package])->with('message', 'TourPackageFaq Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tourpackage_id, $tourpackagefaq_id)
    {
       $data = TourPackageFaq::findorfail($tourpackagefaq_id);

       $data->delete();
       return redirect()->route('tourpackagefaq.create', [$tourpackage_id])->with('message', 'TourPackageFaq Deleted Successfully.');
    }
}
