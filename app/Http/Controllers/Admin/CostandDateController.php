<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CostandDate;
use App\Models\Package;

class CostandDateController extends Controller
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
    public function create(Request $request,$package_id)
    {
        $details = Package::findorfail($package_id)->costanddate()->get();
      $d_id = $package_id;
      return view('admin.package.costanddate.create', compact('details', 'd_id'));

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
            'start_date' => 'required',
            // 'category' => 'required',
          ]);

          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;


          Package::findorfail($package_id)->costanddate()->create($formData);
          return redirect()->route('costanddate.create', [$request->package])->with('message', 'Cost And Date Added Successfully.');
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
    public function edit($package_id, $costanddate_id)
    {
       $costanddate = Package::findorfail($package_id)->costanddate;
    //    dd($faq);
       $detail = CostandDate::findorfail($costanddate_id);
       $d_id = $package_id;

       return view('admin.package.costanddate.edit', compact('costanddate', 'detail', 'd_id'));
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
        'start_date' => 'required',
        // 'category' => 'required',
      ]);

      $formData = $request->all();

      $data = CostandDate::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;


      $data->update($formData);

      return redirect()->route('costanddate.create', [$request->package])->with('message', 'Cost and Date Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, $costanddate_id)
    {
       $data = CostandDate::findorfail($costanddate_id);

       $data->delete();
       return redirect()->route('costanddate.create', [$package_id])->with('message', 'Cost and Date Deleted Successfully.');
    }
}
