<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AssignedController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth', 'profile'])->group(function () {
    Route::get('/', function () {
        return redirect('home');
    });

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/admin/assign', AssignedController::class);
    Route::resource('/admin/courses', CoursesController::class);
    Route::resource('/admin', AdminController::class);
});

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'update']);
