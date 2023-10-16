<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

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

Route::get('/admin', function () {
    return view('admin.layout.master');
});

// Route::get('/profile', function () {
//     return view('page.profile.updateProfile');
// });

// Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::resource('profile', ProfileController::class);
// Route::put('/profile/{id}', [ProfileController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/app', [App\Http\Controllers\HomeController::class, 'app'])->name('app');
