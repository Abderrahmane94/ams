<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index() {

        $data['attendances'] = Attendance::all();
        $data['user'] = User::find(Auth::user()->id);

        return view('doreViews.admin.report', $data);
    }
}
