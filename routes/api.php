<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registr',[UserController::class ,'registr']);

Route::get('getuser/{id}',[UserController::class ,'getUser']);

Route::patch('userupdate/{id}',[UserController::class ,'userUpdate']);

Route::post('userdelete/{id}',[UserController::class ,'userDelete']);

Route::get('userpag',[UserController::class ,'userPag']);

Route::post('crposts/{id}',[PostController::class ,'createPost']);

Route::post('delposts/{id}',[PostController::class ,'DelPost']);
