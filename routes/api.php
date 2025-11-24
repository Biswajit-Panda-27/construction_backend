<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\WebUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [WebUserController::class, 'create']);
Route::post('/login', [AuthenticationController::class, 'login']);

// Example of protected route
Route::middleware('auth:sanctum')->get('/user-profile', function (Request $request) {
    return $request->user();
});
