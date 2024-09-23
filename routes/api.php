<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//Admin Access Only
Route::get('/admin/users', [UserController::class, 'index']);
Route::get('/admin/user/detail/{id}', [UserController::class, 'userById']);
Route::post('/admin/user/store', [UserController::class, 'store']);
Route::put('/admin/user/update/{id}', [UserController::class, 'update']);
Route::patch('/admin/user/update/{id}', [UserController::class, 'update']);
Route::delete('/admin/user/delete/{id}', [UserController::class, 'destroy']);
Route::get('/admin/tickets', [TicketController::class, 'index']);
Route::get('/admin/ticket/detail/{id}', [TicketController::class, 'ticketById']);


//Guest Access Only
Route::get('/guest/tickets', [TicketController::class, 'index']);
Route::get('/guest/ticket/detail/{id}', [TicketController::class, 'ticketById']);
Route::post('/guest/ticket/store', [TicketController::class, 'store']);
Route::put('/guest/ticket/update/{id}', [TicketController::class, 'update']);
Route::patch('/guest/ticket/update/{id}', [TicketController::class, 'update']);
Route::delete('/guest/ticket/delete/{id}', [TicketController::class, 'destroy']);
