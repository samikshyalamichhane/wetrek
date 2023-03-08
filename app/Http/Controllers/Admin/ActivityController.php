<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Support\Str;
use App\Models\Region;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Activity::orderBy('created_at', 'desc')->get();
        return view('admin.activity.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $region = Region::orderBy('created_at','desc')->take(10)->get();
        return view('admin.activity.create',compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
          ]);
          $formInput = $request->except(['published', 'slug']);
          $formInput['slug'] = $this->generateSlug($request->name, $request->slug, null);
          $formInput['published'] = is_null($request->published) ? 0 : 1;
        //   if($request->hasFile('banner_image')){
        //     $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1349, 356, 'yes');
        //   }
          Activity::create($formInput);
          return redirect()->route('activity.index')->with('message', 'Activity Create Successfuly.');
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
    public function edit($id)
    {
        $detail=Activity::findOrFail($id);
        $region = Region::orderBy('created_at','desc')->take(10)->get();
        // dd($region);die;
        
        return view('admin.activity.edit',compact('detail','region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            
          ]);
          $oldRecord = Activity::findorfail($id);
    
          $formInput = $request->except(['slug', 'published']);
          $formInput['slug'] = $this->generateSlug($request->name, $request->slug, $oldRecord);
          $formInput['published'] = is_null($request->published) ? 0 : 1;
          $oldRecord->update($formInput);
          return redirect()->route('activity.index')->with('message', 'Activity Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::find($id)->delete();
        return redirect()->route('activity.index')->with('message', 'Activity Deleted Successfuly.');
    }


    public function generateSlug($name, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($name);
       else
         $slugReturn = Str::slug($slug);

      $count = Activity::where('slug', $slugReturn)->count();

        if(!is_null($oldRecord)){
          if($oldRecord->slug == $slugReturn){
            return $slugReturn;
          }else{
            if($count > 0)
              return $slugReturn . '-' . $count;
            else
              return $slugReturn;
          }
        } else {
            if($count > 0)
              return $slugReturn . '-' . $count;
            else
              return $slugReturn;
        }
    }


}
