<?php

use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ()
{
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);    // ← Refresh
    Route::get('/me', [\App\Http\Controllers\AuthController::class, 'me']);               // ← Me
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('students', \App\Http\Controllers\Api\StudentController::class);
//->middleware('jwt.auth');

Route::apiResource('projects', \App\Http\Controllers\Api\ProjectController::class);
Route::apiResource('faculties', \App\Http\Controllers\Api\FacultyController::class);
Route::apiResource('student-tickets', \App\Http\Controllers\Api\StudentTicketController::class);

Route::post('/students/{student}/attach-projects', [StudentController::class, 'attachProjects']);
Route::post('/students/{student}/detach-projects', [StudentController::class, 'detachProjects']);
Route::post('/students/{student}/sync-projects', [StudentController::class, 'syncProjects']);
