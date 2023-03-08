<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Destination;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::get();
        // $faq = Faq::published()->get();
        return view('admin.faq.list',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$destinatin_id)
    {
        $details = Destination::findorfail($destinatin_id)->faq()->latest()->get();
      $d_id = $destinatin_id;
      return view('admin.faq.create', compact('details', 'd_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$destination_id)
    {
        $request->validate([
            'questions' => 'required',
            'answers' => 'required',
          ]);

          $formData = $request->all();
        $formData['published'] = is_null($request->published) ? 0 : 1;


          Destination::findorfail($destination_id)->faq()->create($formData);
          return redirect()->back()->with('message', 'FAQ Added Successfully.');
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
    public function edit($destination_id, $faq_id)
    {
       $destinationfaq = Destination::findorfail($destination_id)->faq;
    //    dd($faq);
       $detail = Faq::findorfail($faq_id);
       $d_id = $destination_id;

       return view('admin.faq.edit', compact('destinationfaq', 'detail', 'd_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $destination_id, $id)
    {
       $request->validate([
        'questions' => 'required',
        'answers' => 'required',
      ]);

      $formData = $request->all();

      $data = Faq::findorfail($id);
      $formData['published'] = is_null($request->published) ? 0 : 1;


      $data->update($formData);

      return redirect()->route('destinationfaq.create', [$request->destination])->with('message', 'Faq Edited Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($destinatin_id, $faq_id)
    {
       $data = Faq::findorfail($faq_id);

       $data->delete();
       return redirect()->route('destinationfaq.create', [$destinatin_id])->with('message', 'Faq Deleted Successfully.');
    }
}
