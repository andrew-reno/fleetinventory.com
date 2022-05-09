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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

	Route::post('show', [SpacecraftController::class,'show']);
	Route::post('create', [SpacecraftController::class,'create']);
	// Idempotent
	Route::put('edit', [SpacecraftController::class,'edit']);
	Route::delete('delete', [SpacecraftController::class,'destroy']);
});

//Route::post('show', [SpacecraftController::class,'show']);
 