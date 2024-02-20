<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


Route::group(['middleware' => 'auth'], function () {

    // Language Routes

    Route::get('locale/{locale}', function ($locale) {
        Session::put('locale', $locale);
        return redirect()->back();
    });


    // User Management All Routes

    Route::prefix('users')->group(function () {

        Route::get('/view', [UserController::class, 'UserView'])->name('users.view');

        Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

        Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');

        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');

        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');

        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

    });

    /// User Profile and Change Password

    Route::prefix('profile')->group(function () {

        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');

        Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');

        Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');

        Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');

        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

    });

    /// Admin Routes

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    /// User Routes

    Route::prefix('user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::post('/signin', [UserController::class, 'signIn'])->name('user.signin');
        Route::post('/signout', [UserController::class, 'signOut'])->name('user.signout');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });

    // Report Routes

    Route::prefix('report')->group(function () {
        Route::get('/view', [ReportController::class, 'index'])->name('report.view');
    });



}); // End Middleware Auth Route
