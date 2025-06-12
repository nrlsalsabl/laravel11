<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportCategoryController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResidentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/loginn', [LoginController::class, 'index'])->name('login');
Route::post('/loginn', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/resident', ResidentController::class);
    Route::resource('/report-category', ReportCategoryController::class);
    Route::resource('/report', ReportController::class);
});


// Route::get('/dashboard', function () {
//     return view('../home/index');
// });
