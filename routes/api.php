<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/channels', ChannelController::class)->middleware('auth');
Route::apiResource('/chats', ChatController::class)->middleware('auth');
Route::apiResource('/messages', MessageController::class)->middleware('auth');
Route::apiResource('/users', UserController::class)->middleware('auth');
Route::apiResource('/tasks', TaskController::class)->middleware('auth');
