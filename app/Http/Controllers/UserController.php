<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class UserController extends Controller
{
    public function UserView()
    {
        $data['allData'] = User::all();
//        $data['allData'] = User::where('name', 'Admin')->get();
        return view('doreViews.admin.user.list_user', $data);

    }

    public function UserAdd()
    {
        return view('doreViews.admin.user.add_user');
    }


    public function UserStore(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'

        );


        return redirect()->route('users.view')->with($notification);

    }

    public function UserEdit($id)
    {
        $editData = User::find($id);
        return view('doreViews.admin.user.edit_user', compact('editData'));

    }

    public function UserUpdate(Request $request, $id)
    {

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/img/profiles' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/img/profiles'), $filename);
            $data['profile_photo_path'] = '/img/profiles/'.$filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('users.view')->with($notification);

    }

    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('users.view')->with($notification);

    }

    public function index()
    {
        $data['user'] = User::find(Auth::user()->id);
        return view('doreViews.admin.userDashboard', $data);
    }

    public function signIn(Request $request)
    {
        // Enregistrement de l'entrée de l'utilisateur
        $user = Auth::user();
        $user->last_login_at = Carbon::now();
        $user->login_status = true;
        $user->save();

        $notification = array(
            'message' => 'دخول مسجل بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function signOut(Request $request)
    {
        // Enregistrement de la sortie de l'utilisateur
        $user = Auth::user();
        $user->login_status = false;
        $user->save();

        $notification = array(
            'message' => 'خروج مسجل بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
