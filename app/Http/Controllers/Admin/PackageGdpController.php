<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackageGdp;
use App\Models\Package;

class PackageGdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagegdp = PackageGdp::get();
        // $packagegdp = PackageGdp::published()->get();
        return view('admin.packagegdp.list',compact('packagegdp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$package_id)
    {
        $details = Package::findorfail($package_id)->packagegdp()->take(7)->get();
      $d_id = $package_id;
      return view('admin.package.packagegdp.create', compact('details', 'd_id'));
        
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
            'no_of_persons' => 'required',
            'price_per_person' => 'required',
          ]);
  
          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;
          
  
          Package::findorfail($package_id)->packagegdp()->create($formData);
          return redirect()->route('packagegdp.create', [$request->package])->with('message', 'GDP Added Successfully.');
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
    public function edit($package_id, $packagegdp_id)
    {
       $packagegdp = Package::findorfail($package_id)->packagegdp;
    //    dd($packagegdp);
       $detail = PackageGdp::findorfail($packagegdp_id);
       $d_id = $package_id;

       return view('admin.package.packagegdp.edit', compact('packagegdp', 'detail', 'd_id'));
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
        'no_of_persons' => 'required',
        'price_per_person' => 'required',
      ]);

      $formData = $request->all();
      
      $data = PackageGdp::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;

      
      $data->update($formData);
      
      return redirect()->route('packagegdp.create', [$request->package])->with('message', 'PackageGdp Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, $packagegdp_id)
    {
       $data = PackageGdp::findorfail($packagegdp_id);

       $data->delete();
       return redirect()->route('packagegdp.create', [$package_id])->with('message', 'PackageGdp Deleted Successfully.');
    }
}
