<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('doreViews.admin.user.view_profile', compact('user'));
    }


    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('doreViews.admin.user.edit_profile', compact('user'));
    }


    public function ProfileStore(Request $request)
    {

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/img/profiles' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/img/profiles'), $filename);
            $data['profile_photo_path'] = '/img/profiles/' . $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'تم تحديث الحساب بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    }


    public function PasswordView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('doreViews.admin.user.edit_password', compact('user'));
    }


    public function PasswordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);


        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }

    }
}
