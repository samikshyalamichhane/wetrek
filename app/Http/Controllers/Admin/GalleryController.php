<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Galleryimage;
use Image;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $details = Gallery::orderBy('updated_at', 'DESC')->get();
      return view('admin.gallery.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
          'title' => 'required|max:255',
          'image' => 'required|max:2028|mimes:jpg,jpeg,png,gif',
          'image1' => 'required',
          'image1.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2028',
        ]);

        $gallery = $request->except(['slug', 'published', 'image', 'image1']);
        $gallery['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $gallery['published'] = is_null($request->published) ? 0 : 1;

        if($request->has('image')){
          $gallery['image'] = $this->imageProcessing($request->file('image'));
        }
        $gallery = Gallery::create($gallery);

        $filename = $request->file('image1');
        $koko = $this->saveImagesOfGallery($gallery->id, $filename);

        return redirect()->route('gallery.index')->with('message', 'Gallery Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $detail['gallery'] = $gallery = Gallery::findorfail($id);
       $detail['image'] = $gallery->imagegallery;
       // dd($detail);
       return view('admin.gallery.edit',$detail);
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
         'title' => 'required|max:255',
         'image' => 'max:3048|mimes:jpg,jpeg,gif,png',
         'image1.*' => 'max:3048|mimes:jpg,jpeg,gif,png'
       ]);

       $oldRecord = Gallery::findorfail($id);
       $gallery = $request->except(['slug', 'published', 'image', 'image1']);
       $gallery['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
       $gallery['published'] = is_null($request->published) ? 0 : 1;

       if($request->hasFile('image')){
         $thumbnail = public_path('images/thumbnail/');
            if((file_exists($thumbnail . $oldRecord->image))){
                    unlink($thumbnail . $oldRecord->image);
            }
         $gallery['image'] = $this->imageProcessing($request->image);
        }
        $oldRecord->update($gallery);
         if($request->has('image1')){
           $filename = $request->file('image1');
           $this->saveImagesOfGallery($oldRecord->id, $filename);
         }
       return redirect()->route('gallery.index')->with('message', 'Gallery Updated Successfully.');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $gallery=Gallery::find($id);
      if($gallery->image) {
          $thumbnail = public_path('images/thumbnail/');
          $mainpath = public_path('images/main/');
          if ((file_exists($thumbnail . $gallery->image))) {
              unlink($thumbnail . $gallery->image);
          }
          $allimages = $gallery->imagegallery;
          foreach($allimages as $img){
              if((file_exists($mainpath . $img->image)))
              {
                  unlink($mainpath . $img->image);
              }
              if((file_exists($thumbnail . $img->image)))
              {
                  unlink($thumbnail . $img->image);
              }
          }
      }
      $gallery->delete();
      return redirect()->route('gallery.index')->with('message','Gallery Deleted Successfully.');
    }

//save appropriate size of image for gallery thumbnail
  public function imageProcessing($image){
      ini_set('memory_limit', '256M');
      $input['imagename'] = time() . $image->getClientOriginalName();
      $thumbnail = public_path('images/thumbnail/');
//        $listingPath = public_path('images/images');

      $img = Image::make($image->getRealPath());
      $img->fit(349, 219)->save($thumbnail . $input['imagename']);
      $img->destroy();

      return $input['imagename'];
  }

//save different size of images inside image folder
  public function saveImagesOfGallery($id,$filename)
  {
      ini_set('memory_limit', '500M');
      for ($i = 0; $i < count($filename); $i++) {
          $image = $filename[$i];
          $image_name = time() . $image->getClientOriginalName();

          $main = public_path('images/main/');

          $thumbnail = public_path('images/thumbnail/');

          $img = Image::make($image->getRealPath());
          $img->fit(589, 383)->save($main . $image_name);

          $img = Image::make($image->getRealPath());
          $img->fit(349, 219)->save($thumbnail . $image_name);

          $input = array('gallery_id' => $id, 'image' => $image_name);
          Galleryimage::create($input);
      }
  }

  public function removeParticularImage(Request $request)
  {
    $id = $request->datas;
    $thatImage = Galleryimage::findorfail($id);
    $thumbnail = public_path('images/thumbnail/');
    $main = public_path('images/main/');
    $status = $thatImage->delete();
      if(file_exists($thumbnail . $thatImage->image)){
        unlink($thumbnail . $thatImage->image);
        unlink($main . $thatImage->image);
      }

    if(isset($status)){
      return response()->json(['success' => 'success']);
    } else {
      return response()->json(['error' => 'error in server']);
    }
  }

  public function generateSlug($title, $slug, $oldRecord)
  {
     if(is_null($slug))
        $slugReturn = Str::slug($title);
     else
       $slugReturn = Str::slug($slug);

    $count = Gallery::where('slug', $slugReturn)->count();
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
