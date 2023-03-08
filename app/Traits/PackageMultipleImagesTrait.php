<?php

namespace App\Traits;

use App\Models\Package;
use App\Models\PackageSlider;
use Illuminate\Http\Request;

trait PackageMultipleImagesTrait
{

    public function getMultipleImages($id)
    {
        $oldRecord = Package::findOrFail($id);
        $details = $oldRecord->slider__images;
        // dd($details);
        return view('admin.package.slider.slider', compact('details'))->with('package_id', $id);
    }

    public function multipleImagesStore(Request $request)
    {
        $formInput = $request->except(['sliderimages']);
        if ($request->hasFile('sliderimages')) {
            $image_array = $request->file('sliderimages');
            $array_len = count($image_array);

            for ($i = 0; $i < $array_len; $i++) {
                $image_ext = $image_array[$i]->getClientOriginalExtension();
                $new_image_name = rand(123456789, 999999999) . '.' . $image_ext;
                $package_path = public_path('images/package/multiple');
                $image_array[$i]->move($package_path, $new_image_name);

                $formInput['sliderimages'] = $new_image_name;
                $formInput['package_id'] = $request->package_id;
                $success = PackageSlider::create($formInput);
            }
            return redirect()->back()->with('success', 'Package Images Uploaded Sucessfully');

        } else {
            return back()->with('error', 'Please Choose Images');
        }
    }


    public function deleteEventImage($id)
    {
        $oldRecord = PackageSlider::findorfail($id);

        $imagename = $oldRecord->sliderimages;
        if ($imagename) {
            $mainimage = public_path('images/main/') . $imagename;
            $thumbnail = public_path('images/thumbnail/') . $imagename;
            $multiple = public_path('images/package/multiple/') . $imagename;
            if (file_exists($mainimage)) {
                unlink($mainimage);
            }

            if (file_exists($thumbnail)) {
                unlink($thumbnail);
            }

            if (file_exists($multiple)) {
                unlink($multiple);
            }
        }

        $oldRecord->delete();

        return redirect()->back()->with('success', 'Package Images Deleted Successfuly.');
    }

    public function imageProcessing1($image)
    {
        ini_set('memory_limit', '256M');
        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . $image->getClientOriginalName();
        $mainimage = public_path('images/main/');
        $thumbnail = public_path('images/thumbnail/');

        $img1 = Image::make($image->getRealPath());
        $img1->fit(821, 581)->save($mainimage . $input['imagename']);
        // img1 main image

        $img = Image::make($image->getRealPath());
        $img->fit(360, 253)->save($thumbnail . $input['imagename']);
        // img thumbnail image

        $img->destroy();

        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $mainimage = public_path('images/main/') . $imagename;
        $thumbnail = public_path('images/thumbnail/') . $imagename;
        $multiple = public_path('images/package/multiple/') . $imagename;
        if (file_exists($mainimage)) {
            unlink($mainimage);
        }

        if (file_exists($thumbnail)) {
            unlink($thumbnail);
        }

        if (file_exists($multiple)) {
            unlink($multiple);
        }
    }
}
