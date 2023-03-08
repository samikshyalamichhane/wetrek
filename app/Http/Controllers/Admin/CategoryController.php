<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $details = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.list', compact('details'));
    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $detail = Category::findOrFail($id);
        return view('admin.category.edit', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',

        ]);
        $oldRecord = Category::findorfail($id);
        $formInput = $request->except(['publish']);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        $oldRecord->update($formInput);
        return redirect()->route('category.index')->with('message', 'Category Edited Successfuly.');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('message', 'Category Deleted Successfuly.');
    }
}
