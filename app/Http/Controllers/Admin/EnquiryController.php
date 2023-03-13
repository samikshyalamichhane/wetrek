<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactus;
use App\Models\PackageEnquiry;
use App\Models\Subscriber;

class EnquiryController extends Controller
{
  public function enquiryList()
  {
     $details = Contactus::orderBy('updated_at', 'desc')->get();
     return view('admin.userenquiry.contactus', compact('details'));
  }

  public function packageEnquiryList()
  {
     $details = PackageEnquiry::orderBy('updated_at', 'desc')->get();
     return view('admin.userenquiry.package', compact('details'));
  }

  public function removeEnquiry($id)
  {
    $data = Contactus::findorfail($id);
    $data->delete();
    return redirect()->back()->with('message', 'Enquiry Deleted Successfully.');
  }

  public function removePackageEnquiry($id)
  {
    $data = PackageEnquiry::findorfail($id);
    $data->delete();
    return redirect()->back()->with('message', 'Enquiry Deleted Successfully.');
  }
  public function subscriberList()
  {
    $details = Subscriber::orderBy('updated_at', 'desc')->get();
    return view('admin.userenquiry.subscriber', compact('details'));
  }

  public function removeSubscriber($id)
  {
    $data = Subscriber::findorfail($id);
    $data->delete();
    return redirect()->back()->with('message', 'Subscriber Deleted Successfully.');
  }

  public function viewContact(Request $request)
    {
        // dd($request->id);
        $detail = Contactus::findOrFail($request->id);
        return view('admin.userenquiry.previewContact', compact('detail'));
    }

    public function viewPackageEnquiry(Request $request)
    {
        $detail = PackageEnquiry::findOrFail($request->id);
        return view('admin.userenquiry.previewPackageDetail', compact('detail'));
    }
    
    public function viewNewsletter(Request $request)
    {
        // dd($request->id);
        $detail = Subscriber::findOrFail($request->id);
        return view('admin.userenquiry.previewNewsletter', compact('detail'));
    }

}
