<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackageFaq;
use App\Models\Package;

class PackageFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagefaq = PackageFaq::get();
        // $packagefaq = PackageFaq::published()->get();
        return view('admin.packagefaq.list',compact('packagefaq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$package_id)
    {
        $details = Package::findorfail($package_id)->packagefaq()->take(7)->get();
      $d_id = $package_id;
      return view('admin.package.packagefaq.create', compact('details', 'd_id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$package_id)
    {
        $request->validate([
            'questions' => 'required',
            'answers' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          Package::findorfail($package_id)->packagefaq()->create($formData);
          return redirect()->route('packagefaq.create', [$request->package])->with('message', 'FAQ Added Successfully.');
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
    public function edit($package_id, $packagefaq_id)
    {
       $packagefaq = Package::findorfail($package_id)->packagefaq;
    //    dd($packagefaq);
       $detail = PackageFaq::findorfail($packagefaq_id);
       $d_id = $package_id;

       return view('admin.package.packagefaq.edit', compact('packagefaq', 'detail', 'd_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $package_id, $id)
    {
       $request->validate([
        'questions' => 'required',
        'answers' => 'required',
      ]);

      $formData = $request->all();
      
      $data = PackageFaq::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('packagefaq.create', [$request->package])->with('message', 'PackageFaq Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, $packagefaq_id)
    {
       $data = PackageFaq::findorfail($packagefaq_id);

       $data->delete();
       return redirect()->route('packagefaq.create', [$package_id])->with('message', 'PackageFaq Deleted Successfully.');
    }
}
