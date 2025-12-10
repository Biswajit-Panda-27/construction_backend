<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WebUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/signup', [WebUserController::class, 'create']);
Route::post('/login', [AuthenticationController::class, 'login']);

// Example of protected route
Route::middleware('auth:sanctum')->get('/user-profile', function (Request $request) {
    return $request->user();
});

// authenticated project routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/project', [ProjectController::class, 'create']);
    Route::put('/project/{id}', [ProjectController::class, 'update']);
    Route::delete('/project/{id}', [ProjectController::class, 'destroy']);
});

Route::get('/project', [ProjectController::class, 'read']);
Route::get('/project/{id}', [ProjectController::class, 'readById']);

// to create: http://localhost:8000/api/project
// to read: http://localhost:8000/api/project
// to update: http://localhost:8000/api/project/{id}
// to delete: http://localhost:8000/api/project/{id}

