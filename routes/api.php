<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import the controllers
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DocumentTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Router for users
Route::get('/users', [PersonController::class, 'index']);
Route::get('/users', [PersonController::class, 'filterPeople']);
Route::post('/users', [PersonController::class, 'store']);
Route::post('/users', [PersonController::class, 'login']);
Route::get('/users/{user_id}', [PersonController::class, 'show']);
Route::put('/users/{user_id}', [PersonController::class, 'update']);
Route::delete('/users/{user_id}', [PersonController::class, 'destroy']);

// Router for authentication
Route::post('/login', [AuthController::class, 'login']);

// Routes for cities
Route::get('/cities', 'App\Http\Controllers\CityController@index');

// Routes for document types
Route::get('/document_types', 'App\Http\Controllers\DocumentTypeController@index');