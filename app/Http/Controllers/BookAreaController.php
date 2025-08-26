<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookArea;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class BookAreaController extends Controller
{
    //adminBookAreas
    public function adminBookAreas()
    {
        $bookAreas = BookArea::all();
        return view('backend.book_areas.index', compact('bookAreas'));
    }
    //adminBookAreasCreate
    public function adminBookAreasCreate()
    {
        return view('backend.book_areas.create');
    }
    //adminBookAreasStore
    public function adminBookAreasStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_title' => 'required|string|max:255',
            'main_title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'link_url' => 'required|url',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/book_areas/', $filename);
            $imageName = $filename;
        } else {
            $imageName = null;
        }



        $bookArea = new BookArea();
        $bookArea->image = $imageName;
        $bookArea->short_title = $request->short_title;
        $bookArea->main_title = $request->main_title;
        $bookArea->short_description = $request->short_description;
        $bookArea->description = $request->description;
        $bookArea->link_url = $request->link_url;
        $bookArea->status = $request->status;
        $bookArea->created_by = Auth::user()->id;
        $bookArea->save();
        //notification
        $notification = [
            'message' => 'Book area created successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.book_areas.index')->with($notification);
    }
    //adminBookAreasEdit
    public function adminBookAreasEdit($id)
    {
        $bookArea = BookArea::findOrFail($id);
        return view('backend.book_areas.edit', compact('bookArea'));
    }
    //adminBookAreasUpdate
    public function adminBookAreasUpdate(Request $request, $id)
    {
        $bookArea = BookArea::findOrFail($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_title' => 'required|string|max:255',
            'main_title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'link_url' => 'required|url',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($bookArea->image) {
                unlink(public_path('upload/book_areas/' . $bookArea->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/book_areas/', $filename);
            $bookArea->image = $filename;
        }

        $bookArea->short_title = $request->short_title;
        $bookArea->main_title = $request->main_title;
        $bookArea->short_description = $request->short_description;
        $bookArea->description = $request->description;
        $bookArea->link_url = $request->link_url;
        $bookArea->status = $request->status;
        $bookArea->created_by = Auth::user()->id;
        $bookArea->save();
        //notification
        $notification = [
            'message' => 'Book area updated successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.book_areas.index')->with($notification);
    }
}
