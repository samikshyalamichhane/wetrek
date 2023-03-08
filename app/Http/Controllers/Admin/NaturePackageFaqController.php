<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NaturePackageFaq;
use App\Models\NaturePackage;

class NaturePackageFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naturepackagefaq = NaturePackageFaq::get();
        // $naturepackagefaq = NaturePackageFaq::published()->get();
        return view('admin.naturepackagefaq.list',compact('naturepackagefaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$naturepackage_id)
    {
        $details = NaturePackage::findorfail($naturepackage_id)->naturepackagefaq()->take(7)->get();
      $d_id = $naturepackage_id;
      return view('admin.nature_package.naturepackagefaq.create', compact('details', 'd_id'));
        
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
            'questions' => 'required',
            'answers' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          NaturePackage::findorfail($naturepackage_id)->naturepackagefaq()->create($formData);
          return redirect()->route('naturepackagefaq.create', [$request->package])->with('message', 'FAQ Added Successfully.');
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
    public function edit($naturepackage_id, $naturepackagefaq_id)
    {
       $naturepackagefaq = NaturePackage::findorfail($naturepackage_id)->naturepackagefaq;
    //    dd($naturepackagefaq);
       $detail = NaturePackageFaq::findorfail($naturepackagefaq_id);
       $d_id = $naturepackage_id;

       return view('admin.nature_package.naturepackagefaq.edit', compact('naturepackagefaq', 'detail', 'd_id'));
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
        'questions' => 'required',
        'answers' => 'required',
      ]);

      $formData = $request->all();
      
      $data = NaturePackageFaq::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('naturepackagefaq.create', [$request->package])->with('message', 'NaturePackageFaq Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($naturepackage_id, $naturepackagefaq_id)
    {
       $data = NaturePackageFaq::findorfail($naturepackagefaq_id);

       $data->delete();
       return redirect()->route('naturepackagefaq.create', [$naturepackage_id])->with('message', 'NaturePackageFaq Deleted Successfully.');
    }
}