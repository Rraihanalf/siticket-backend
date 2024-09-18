<?php

use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::patch('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);


Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/ticket/store', [TicketController::class, 'store']);
Route::put('/ticket/update/{id}', [TicketController::class, 'update']);
Route::patch('/ticket/update/{id}', [TicketController::class, 'update']);
Route::delete('/ticket/delete/{id}', [TicketController::class, 'destroy']);
