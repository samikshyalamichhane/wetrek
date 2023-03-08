<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Support\Str;
use App\Models\Destinationtype;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Group::orderBy('created_at', 'desc')->get();
        return view('admin.group.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinationtype=Destinationtype::orderBy('created_at','desc')->take(2)->get();
        return view('admin.group.create',compact('destinationtype'));
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
          'title' => 'required',
        ]);
        $formInput = $request->except(['publish', 'slug']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['publish'] = is_null($request->publish) ? 0 : 1;
        if($request->hasFile('banner_image')){
          $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1349, 356, 'yes');
        }
        Group::create($formInput);
        return redirect()->route('group.index')->with('message', 'Group Create Successfuly.');
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
        $detail=Group::findOrFail($id);
        $destinationtype=Destinationtype::orderBy('created_at','desc')->take(2)->get();
        return view('admin.group.edit',compact('detail','destinationtype'));
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
        'title' => 'required',
        
      ]);
      $oldRecord = Group::findorfail($id);

      $formInput = $request->except(['slug', 'publish', 'banner_image']);
      $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
      $formInput['publish'] = is_null($request->publish) ? 0 : 1;
      if($request->hasFile('banner_image')){
        if($oldRecord->banner_image){
          $this->unlinkImage($oldRecord->banner_image);
        }
        $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1349, 356, 'yes');
      }
      $oldRecord->update($formInput);
      return redirect()->route('group.index')->with('message', 'Group Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::find($id)->delete();
        return redirect()->route('group.index')->with('message', 'Group Deleted Successfuly.');

    }
    public function generateSlug($title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($title);
       else
         $slugReturn = Str::slug($slug);

      $count = Group::where('slug', $slugReturn)->count();

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
