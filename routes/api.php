<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DBLibraryController;
use App\Http\Controllers\PersonalityController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->prefix('libraries')->group(function () {
    Route::get('/{modeltype}', [DBLibraryController::class, 'index']);
    Route::post('/{modeltype}/{object}', [DBLibraryController::class, 'store']);
    Route::put('/{modeltype}/{id}/{object}', [DBLibraryController::class,'update']);
    Route::delete('/{modeltype}/{id}', [DBLibraryController::class, 'destroy']);
});

Route::prefix('personality')->group(function(){
    Route::get('/', [PersonalityController::class, 'index']);
    Route::get('/{pID}', [PersonalityController::class, 'show']);
    Route::post('/', [PersonalityController::class, 'store']);
    Route::get('/{pID}', [PersonalityController::class, 'update']);
    Route::get('/{pID}', [PersonalityController::class, 'destroy']);
});

    Route::get('/test', [DBLibraryController::class, 'index']);

