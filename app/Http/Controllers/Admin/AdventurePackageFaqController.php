<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdventurePackageFaq;
use App\Models\AdventurePackage;


class AdventurePackageFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adventurepackagefaq = AdventurePackageFaq::get();
        // $adventurepackagefaq = AdventurePackageFaq::published()->get();
        return view('admin.adventurepackagefaq.list',compact('adventurepackagefaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$adventurepackage_id)
    {
        $details = AdventurePackage::findorfail($adventurepackage_id)->adventurepackagefaq()->take(7)->get();
      $d_id = $adventurepackage_id;
      return view('admin.adventure_package.adventurepackagefaq.create', compact('details', 'd_id'));
        
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
            'questions' => 'required',
            'answers' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          AdventurePackage::findorfail($adventurepackage_id)->adventurepackagefaq()->create($formData);
          return redirect()->route('adventurepackagefaq.create', [$request->package])->with('message', 'FAQ Added Successfully.');
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
    public function edit($adventurepackage_id, $adventurepackagefaq_id)
    {
       $adventurepackagefaq = AdventurePackage::findorfail($adventurepackage_id)->adventurepackagefaq;
    //    dd($adventurepackagefaq);
       $detail = AdventurePackageFaq::findorfail($adventurepackagefaq_id);
       $d_id = $adventurepackage_id;

       return view('admin.adventure_package.adventurepackagefaq.edit', compact('adventurepackagefaq', 'detail', 'd_id'));
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
        'questions' => 'required',
        'answers' => 'required',
      ]);

      $formData = $request->all();
      
      $data = AdventurePackageFaq::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('adventurepackagefaq.create', [$request->package])->with('message', 'AdventurePackageFaq Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adventurepackage_id, $adventurepackagefaq_id)
    {
       $data = AdventurePackageFaq::findorfail($adventurepackagefaq_id);

       $data->delete();
       return redirect()->route('adventurepackagefaq.create', [$adventurepackage_id])->with('message', 'AdventurePackageFaq Deleted Successfully.');
    }
}
