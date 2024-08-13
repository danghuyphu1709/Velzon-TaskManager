<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Client\CommentTaskController;
use \App\Http\Controllers\Client\HomeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['web'])->post('binh-luan/{task}',[CommentTaskController::class,'sendMessage'])->name('comment.sendMessage');

Route::middleware(['web'])->post('important',[HomeController::class,'important'])->name('tables.important');
