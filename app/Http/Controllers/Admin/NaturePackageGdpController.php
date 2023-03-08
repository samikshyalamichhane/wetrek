<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NaturePackageGdp;
use App\Models\NaturePackage;

class NaturePackageGdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naturepackagegdp = NaturePackageGdp::get();
        // $naturepackagegdp = NaturePackageGdp::published()->get();
        return view('admin.naturepackagegdp.list',compact('naturepackagegdp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$naturepackage_id)
    {
        $details = NaturePackage::findorfail($naturepackage_id)->naturepackagegdp()->take(7)->get();
      $d_id = $naturepackage_id;
      return view('admin.nature_package.naturepackagegdp.create', compact('details', 'd_id'));
        
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
            'no_of_persons' => 'required',
            'price_per_person' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          NaturePackage::findorfail($naturepackage_id)->naturepackagegdp()->create($formData);
          return redirect()->route('naturepackagegdp.create', [$request->package])->with('message', 'Nature & Wildlife Package Group Discount Price Added Successfully.');
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
    public function edit($naturepackage_id, $naturepackagegdp_id)
    {
       $naturepackagegdp = NaturePackage::findorfail($naturepackage_id)->naturepackagegdp;
    //    dd($naturepackagegdp);
       $detail = NaturePackageGdp::findorfail($naturepackagegdp_id);
       $d_id = $naturepackage_id;

       return view('admin.nature_package.naturepackagegdp.edit', compact('naturepackagegdp', 'detail', 'd_id'));
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
        'no_of_persons' => 'required',
        'price_per_person' => 'required',
      ]);

      $formData = $request->all();
      
      $data = NaturePackageGdp::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('naturepackagegdp.create', [$request->package])->with('message', 'Nature & Wildlife Package Group Discount Price Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($naturepackage_id, $naturepackagegdp_id)
    {
       $data = NaturePackageGdp::findorfail($naturepackagegdp_id);

       $data->delete();
       return redirect()->route('naturepackagegdp.create', [$naturepackage_id])->with('message', 'Nature & Wildlife Package Group Discount Price Deleted Successfully.');
    }
}
