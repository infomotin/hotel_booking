<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //adminDashboard
    public function adminDashboard(){
        return view('admin.index');
    }
    //adminProfile
    public function adminProfile(){
        $id = Auth::guard('web')->user()->id;
        $data = User::find($id);
        return view('admin.admin_profile', compact('data'));
    }
    //adminProfileUpdate
    public function adminProfileUpdate(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        $id = $request->input('id');
        $data = User::find($id);
        if(!$data){
            return redirect()->back()->with('error', 'User not found');
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }
        // Now update the user data
        $data->name = $request->input('name');
        $data->nid = $request->input('nid');
        $data->gender = $request->input('gender');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->save();
        $notification = array(
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
    //adminLogin
    public function adminLogin(){
        return view('admin.admin_login');
    }
    //adminLogout
    public function adminLogout(Request $request):RedirectResponse{
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
