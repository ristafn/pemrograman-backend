<?php

use App\Http\Controllers\AuthControlller;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\StatusPatientsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 
Route::middleware(['auth:sanctum'])->group(function () {
    // membuat get, post, put, delete dengan apiResource
    // patients route
    Route::apiResource('/patients', PatientsController::class);
    Route::get('/patients/search/{name}', [PatientsController::class, 'getSearch']);
    Route::get('/patients/status/{status}', [PatientsController::class, 'getStatus']);

    // status patients route
    Route::apiResource('/status', StatusPatientsController::class);
});

// auth route
Route::post('/register', [AuthControlller::class, 'register']);
Route::post('/login', [AuthControlller::class, 'login']);
