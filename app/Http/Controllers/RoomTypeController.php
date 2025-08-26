<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use Illuminate\Support\Facades\Auth;

class RoomTypeController extends Controller
{
    //adminRoomTypes
    public function adminRoomTypes()
    {
        $roomTypes = RoomType::all();
        return view('backend.room_types.index', compact('roomTypes'));
    }

    public function adminRoomTypesCreate()
    {
        return view('backend.room_types.create');
    }

    public function adminRoomTypesStore(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'icon' => 'nullable|string',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);

        $validated['created_by'] = Auth::user()->id;

        RoomType::create($validated);

        return redirect()->route('admin.room_types.index')->with('success', 'Room type created successfully.');
    }

    public function adminRoomTypesEdit($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('backend.room_types.edit', compact('roomType'));
    }

    public function adminRoomTypesUpdate(Request $request, $id )
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'icon' => 'nullable|string',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);

        RoomType::where('id', $id)->update($validated);

        return redirect()->route('admin.room_types.index')->with('success', 'Room type updated successfully.');
    }

    public function adminRoomTypesDelete($id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();
        return redirect()->route('admin.room_types.index')->with('success', 'Room type deleted successfully.');
    }
}
