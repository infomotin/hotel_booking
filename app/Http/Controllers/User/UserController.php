<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index
    public function index()
    {
        return view('frontend.index');
    }
    //show
    public function show()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.dashboard.edit_profile', compact('user'));
    }
    //update
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/user_images/', $filename);
            $user->photo = $filename;
        }

        $user->save();
        $notification = array(
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
