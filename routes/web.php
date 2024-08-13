<?php

use App\Http\Controllers\ProfileController;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\Client\HomeController;
//use App\Http\Controllers\Client\SpaceController;
use \App\Http\Controllers\Client\TableController;
use \App\Http\Controllers\Client\ListTaskController;
use \App\Http\Services\SendMailConfirmSpace;
use App\Http\Controllers\Client\TaskController;
use App\Http\Controllers\Client\StepTaskController;
use App\Notifications\SystemNotification;
use App\Http\Controllers\Admin\DashBoardController;
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
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Home Controller */
    Route::get('/',[HomeController::class,'index'])->name('home');
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

        Route::post('them-quyen-quan-tri/{tables}/{user}',[TableController::class,'addRoleUser'])->name('tables.add_admin');

        Route::post('xoa-quyen-quan-tri/{tables}/{user}',[TableController::class,'deleteRoleUser'])->name('tables.delete_admin');
    });

    Route::prefix('nhiem-vu/')->group(function () {

        Route::post('them/{tables}',[ListTaskController::class,'store'])->name('taskList.store');

        Route::put('sua/{listTask}',[ListTaskController::class,'update'])->name('taskList.update');

        Route::delete('xoa/{listTask}',[ListTaskController::class,'destroy'])->name('taskList.destroy');
    });

    Route::prefix('noi-dung-nhiem-vu/')->group(function () {

        Route::get('{code}',[TaskController::class,'index'])->name('task.index');

        Route::post('them/{listTask}',[TaskController::class,'store'])->name('task.store');

        Route::put('sua/{task}',[TaskController::class,'update'])->name('task.update');

        Route::delete('xoa/{task}',[TaskController::class,'destroy'])->name('task.destroy');

        Route::post('thanh-vien/{task}',[TaskController::class,'inviteMembers'])->name('task.inviteMembers');

        Route::post('them-buoc-nhiem-vu/{task}',[StepTaskController::class,'store'])->name('step.store');

        Route::post('cap-nhat-trang-thai-buoc-nhiem-vu/{task}',[StepTaskController::class,'updateStatus'])->name('step.updateStatus');

        Route::delete('ket-thuc-nhiem-vu/{task}',[TaskController::class,'endDueTime'])->name('task.endDueTime');

        Route::post('bat-dau-nhiem-vu/{task}',[TaskController::class,'startDueTime'])->name('task.startDueTime');

    });


});

Route::middleware('auth')->group(function () {

    Route::prefix('quan-ly/')->group(function () {
        Route::get('thong-ke',[DashBoardController::class,'index'])->name('admin.index');
    });
});

Route::get('/500', function () {
    return view('client.layouts.500');
})->name('500');

Route::get('/system/private', function () {
    return view('client.layouts.private');
})->name('system.private');


Route::get('/notify', function () {

    $tasks = Task::query()->with('user')->get();

    if($tasks){
        foreach ($tasks as $task) {
            $user = $task->user;
            Notification::send($user,new SystemNotification($task));
        }
    }

    dd('done');
    dd(Carbon::now()->subDay());
})->name('system.private');

Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('callback/google', [LoginGoogleController::class, 'handleCallback']);

require __DIR__.'/auth.php';
