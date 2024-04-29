<?php

use App\Exceptions\Handler;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;

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



use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;


/* AJAX */

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index');


Route::get('/', function () {
    return  view('welcome');
});

/*USERS */
Route::group(['prefix' => 'user'], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index')->middleware('admin');
    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::post('store', [UserController::class, 'store'])->name('user.store')->middleware('admin');
});






/*BACKEND ROUTES */
Route::get('/admin', [AuthController::class, 'index'])->name('auth.admin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('admin');



// Route::get('/', function () {
//     return redirect('/dashboard');
// })->middleware('auth');
// Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
// Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
// Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
// Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
// Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
// Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
// Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
// Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
//     Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
//     Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
//     Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
//     Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
//     Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
//     Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
//     Route::get('/{page}', [PageController::class, 'index'])->name('page');
//     Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// });
