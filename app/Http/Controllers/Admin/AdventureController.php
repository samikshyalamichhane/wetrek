<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adventure;
use Illuminate\Support\Str;

class AdventureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Adventure::orderBy('created_at', 'desc')->get();
        return view('admin.adventure.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adventure.create');
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
          Adventure::create($formInput);
          return redirect()->route('adventure.index')->with('message', 'Adventure Create Successfuly.');
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
        $detail=Adventure::findOrFail($id);
        return view('admin.adventure.edit',compact('detail'));
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
          $oldRecord = Adventure::findorfail($id);
    
          $formInput = $request->except(['slug', 'published']);
          $formInput['slug'] = $this->generateSlug($request->name, $request->slug, $oldRecord);
          $formInput['published'] = is_null($request->published) ? 0 : 1;
        //   if($request->hasFile('banner_image')){
        //     if($oldRecord->banner_image){
        //       $this->unlinkImage($oldRecord->banner_image);
        //     }
        //     $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1349, 356, 'yes');
        //   }
          $oldRecord->update($formInput);
          return redirect()->route('adventure.index')->with('message', 'Adventure Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Adventure::find($id)->delete();
        return redirect()->route('adventure.index')->with('message', 'Adventure Deleted Successfuly.');
    }


    public function generateSlug($name, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($name);
       else
         $slugReturn = Str::slug($slug);

      $count = Adventure::where('slug', $slugReturn)->count();

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

