<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/app', [HomeController::class, 'app'])->name('app');

Route::group(['middleware' => 'verified'], function () {
  Route::g
  Route::get('/', [UserController::class, 'index'])->name('profile.show');
  Route::get('/{id}/edit', [UserController::class, 'edit'])->name('profile.edit');
  Route::put('/{id}', [UserController::class, 'update'])->name('profile.update');
});

//login google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

//verifikasi email
Route::group(['middleware' => ['auth']], function () {
  Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
  Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
  Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

  Route::group(['middleware' => ['verified']], function () {
    /**
     * Dashboard Routes
     */
    Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');
  });
});

Route::group(['middleware'=> ['verified', 'role:admin'], 'prefix' => 'role'], function () {
  Route::get('/', function () {
    return view('page.role.showAllRole');
  });
  Route::get('/{id}', function () {
    return view('page.role.roleDetail');
  })->name('roleDetail');
});


// Route::get('/roleDetail/{role}', 'RoleController@showUsersForRole')->name('role.users');
// Reset password route bisa dilihat di :
// vendor/laravel/ui/src/AuthRouteMethods
