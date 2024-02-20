<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        $data['user'] = User::find(Auth::user()->id);

        $todayDate = Carbon::today();
        $data['todayAttendances'] = Attendance::where('entry_day', $todayDate->format('Y-m-d'))->get();
        $data['users'] = User::all(); // Retrieve all users

        return view('doreViews.admin.adminDashboard', $data);
    }
}
