<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{

  public function index()
  {
    $details = Team::orderBy('position', 'asc')->get();
    return view('admin.team.list', compact('details'));
  }

  public function create()
  {
    return view('admin.team.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'image' => 'mimes:jpg,jpeg,png,gif|max:3048',
      'position' => 'required|unique:teams'
    ]);
    $formInput = $request->except(['image', 'published', 'slug']);
    // $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
    $formInput['slug'] = $this->generateSlug($request->name, $request->slug, null);

    $formInput['published'] = is_null($request->published) ? 0 : 1;
    if ($request->hasFile('image')) {
      $file = $request->image;
      $filename = time() . '-image.' . $file->getClientOriginalExtension();
      $path = $file->storeAs('public/teams', $filename);
      $formInput['image'] = $path;
    }
    Team::create($formInput);
    return redirect()->route('team.index')->with('message', 'Team Create Successfuly.');
  }

  public function edit($id)
  {
    $detail = Team::findorfail($id);
    return view('admin.team.edit', compact('detail'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required',
      'image' => 'mimes:jpg,jpeg,png,gif|max:3048',
      'position' => 'required|unique:teams'
    ]);
    $oldRecord = Team::findorfail($id);

    $formInput = $request->except(['published', 'image', 'slug']);
    $formInput['slug'] = $this->generateSlug($request->name, $request->slug, $oldRecord);
    $formInput['published'] = is_null($request->published) ? 0 : 1;
    if ($request->hasFile('image')) {
      if ($oldRecord->image) {
        Storage::delete($oldRecord->image);
      }
      $file = $request->image;
      $filename = time() . '-image.' . $file->getClientOriginalExtension();
      $path = $file->storeAs('public/teams', $filename);
      $formInput['image'] = $path;
    }
    $oldRecord->update($formInput);
    return redirect()->route('team.index')->with('message', 'Team Edited Successfuly.');
  }

  public function destroy($id)
  {
    $record = Team::findorfail($id);
    if ($record->image) {
      Storage::delete($record->image);
    }
    $record->delete();
    return redirect()->route('team.index')->with('message', 'Team Deleted Successfuly.');
  }

  public function generateSlug($name, $slug, $oldRecord)
  {
    if (is_null($slug))
      $slugReturn = Str::slug($name);
    else
      $slugReturn = Str::slug($slug);

    $count = Team::where('slug', $slugReturn)->count();

    if (!is_null($oldRecord)) {
      if ($oldRecord->slug == $slugReturn) {
        return $slugReturn;
      } else {
        if ($count > 0)
          return $slugReturn . '-' . $count;
        else
          return $slugReturn;
      }
    } else {
      if ($count > 0)
        return $slugReturn . '-' . $count;
      else
        return $slugReturn;
    }
  }
}
