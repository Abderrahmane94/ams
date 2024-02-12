<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['users'] = User::all(); // Retrieve all users
        return view('doreViews.admin.adminDashboard', $data);
    }
}
