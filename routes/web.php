<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Admin route start
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/category', function () {
            return view('admin.category');
        })->name('category');

        Route::get('/users', function () {
            return view('admin.users');
        })->name('users');

        Route::get('/setting', function () {
            return view('admin.setting');
        })->name('setting');

    });

  });

//   User route start
  Route::middleware(['auth', 'isUser'])->group(function () {

    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('mydashboard');

    Route::get('/profile', function () {
        return view('user.profile');
    })->name('myprofile');

    Route::get('/orders', function () {
        return view('user.order');
    })->name('myorders');

  });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
