<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\Client\HomeController;
//use App\Http\Controllers\Client\SpaceController;
use \App\Http\Controllers\Client\TableController;
use \App\Http\Controllers\Client\ListTaskController;
use \App\Http\Services\SendMailConfirmSpace;
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
//    Route::resource('khong-gian',SpaceController::class);
//    Route::prefix('khong-gian')->group(function () {
//        Route::post('/them-thanh-vien/{spaces}',[SpaceController::class,'accede'])->name('space.accede');
//        Route::post('/xoa-khong-gian/{spaces}/{user}',[SpaceController::class,'destroy'])->name('space.destroy');
//        Route::delete('/roi-khoi/{spaces}',[SpaceController::class,'leave'])->name('space.leave');
//    });
    /* send email member tables */
    Route::post('tables/moi-thanh-vien/{tables}',[SendMailConfirmSpace::class,'validateSendMail'])->name('send.member');
    Route::get('velzon/xac-nhan-tham-gia/{token}',[SendMailConfirmSpace::class,'acceptAccede'])->name('space.acceptAccede');

    /* Table Controller */
    Route::prefix('bang/')->group(function () {
        Route::get('{tables}',[TableController::class,'index'])->name('tables.index');

        Route::post('tao-bang',[TableController::class,'store'])->name('tables.store');

        Route::put('sua-bang/{tables}',[TableController::class,'update'])->name('tables.update');

        Route::get('thong-tin/{tables}',[TableController::class,'show'])->name('tables.show');

        Route::post('them-thanh-vien/{tables}',[TableController::class,'accede'])->name('tables.accede');

        Route::post('xoa-khong-gian/{tables}/{user}',[TableController::class,'destroy'])->name('tables.destroy');

        Route::delete('roi-khoi/{tables}',[TableController::class,'leave'])->name('tables.leave');
    });

    Route::prefix('nhiem-vu/')->group(function () {

        Route::post('them/{tables}',[ListTaskController::class,'store'])->name('taskList.store');

        Route::put('sua/{listTask}',[ListTaskController::class,'update'])->name('taskList.update');

        Route::delete('xoa/{listTask}',[ListTaskController::class,'destroy'])->name('taskList.destroy');
    });
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
