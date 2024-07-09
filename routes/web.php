<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\SpaceController;
use \App\Http\Controllers\Client\TableController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Home Controller */
    Route::get('/',[HomeController::class,'index'])->name('home');
    /* Space Controller */
    Route::resource('spaces',SpaceController::class);
    /* Table Controller */
    Route::resource('tables',TableController::class);
});

Route::get('/500', function () {
    return view('client.layouts.500');
})->name('500');

Route::get('/system/private', function () {
    return view('client.layouts.private');
})->name('system.private');


Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('callback/google', [LoginGoogleController::class, 'handleCallback']);

require __DIR__.'/auth.php';
