<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpacecraftController;
 
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

/**
* Register new user to obtain a token for future API requests
*/
Route::post('register', [AuthController::class, 'register']);

/**
* Login a user with a barer token obtained from us
*/
Route::post('login', [AuthController::class, 'login']);

/**
* Restriced access with sanctum middleware. 
* Ops can only be performed by an authorised member of the imperial fleet  
*/
Route::middleware('auth:sanctum')->group(function () {

	Route::post('show', [SpacecraftController::class,'show']);
	Route::post('create', [SpacecraftController::class,'store']);
	Route::put('edit', [SpacecraftController::class,'edit']);
	Route::delete('delete', [SpacecraftController::class,'destroy']);
});

 