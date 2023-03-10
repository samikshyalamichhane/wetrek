<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Destinationtype;
use App\Models\Package;
use App\Models\Region;
use Illuminate\Http\Request;

class ResolveController extends Controller
{
    public function show(Request $request, string $slug)
    {

        $page = \App\Models\Page::published()->where('slug', $slug)->first();
        if ($page) {
            return HomeController::dynamicPages($slug);
        }
        $destinationType = Category::where('published',1)->whereSlug($slug)->first();
        
        if ($destinationType) {
            return HomeController::destinationCategoriesDetail($slug);
        }
        $destinationType = Destinationtype::published()->whereSlug($slug)->first();
        if ($destinationType) {
            return HomeController::destinationCategoryDetail($slug);
        }
        $region = Region::where('publish', 1)->whereSlug($slug)->first();
        if($region){
            return HomeController::category($slug);
        }
        $destination = Destination::published()->whereSlug($slug)->first();
        if($destination){
            return HomeController::destinationDetail($slug);
        }
        $package = Package::published()->whereSlug($slug)->first();
        // dd($package);
        if($package){
            return HomeController::packageDetails($slug);
        }
        

        abort(404);
        
    }

    public function showTwoSlug(Request $request,string $destination, string $slug)
    {   
        $destinationType = Category::published()->whereSlug($slug)->first();
        
        if ($destinationType) {
            return HomeController::destinationCategoryDetail($destination,$slug);
        } 
        $destinationType = Destinationtype::published()->whereSlug($slug)->first();
        dd($destinationType);
        if ($destinationType) {
            return HomeController::destinationCategoryDetail($destination,$slug);
        }
        $region = Region::where('publish', 1)->whereSlug($slug)->first();
        if($region){
            return HomeController::category($slug);
        }
        $destination = Destination::published()->whereSlug($slug)->first();
        if($destination){
            return HomeController:: destinationDetail($slug);
        }
        abort(404);
        
    }


}
