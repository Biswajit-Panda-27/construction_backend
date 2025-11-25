<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProjectController;
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

// authenticated project routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/project', [ProjectController::class, 'create']);
    Route::put('/project/{id}', [ProjectController::class, 'update']);
    Route::delete('/project/{id}', [ProjectController::class, 'destroy']);
});

Route::get('/project', [ProjectController::class, 'read']);
Route::get('/project/{id}', [ProjectController::class, 'readById']);

// {
//     "contractor_name": "John Doe",
//     "contractor_number": "1231231231",
//     "contractor_email": "john@gmail.com",
//     "contractor_image": "https://images.unsplash.com/photo-1457449940276-e8deed18bfff?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
//     "building_image": "https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
//     "spent_amount": "32cr",
//     "location": "Hyderabad"
// }

//      token=    12|F0Z7HF4s2WKc8qz5uzyXlJn4Pku2ExyY6tCH4Rf5cd1fd02b
