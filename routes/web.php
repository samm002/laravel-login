<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::group(['prefix' => 'auth'], function () {
  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
  Auth::routes();
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/app', [HomeController::class, 'app'])->name('app');

Route::get('/profile', [UserController::class, 'index']);
Route::get('/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::put('/update', [UserController::class, 'update'])->name('profile.update');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::group([
  'middleware' => ['auth', 'role:admin']
], function() {
  Route::get('/profile', [ProfileController::class, 'index']);
  Route::get('/profile/{id}', [ProfileController::class, 'show']);
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/superadmin', [SuperAdminController::class, 'index']);

Route::get('/role/app', [HomeController::class, 'app'])->middleware('role:admin');
// Route::get('/copywriter/dashboard', 'CopyWriterController@dashboard')->middleware('checkRole:copy writer');

Route::get('/role', function () {
  return view('page.role.showAllRole');
});

Route::get('/role/{id}', function () {
  return view('page.role.roleDetail');
});
