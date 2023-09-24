<?php

use App\Models\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//All requests
Route::get('/', [RequestController::class, 'index']);

// Show create request
Route::get('/requests/create', [RequestController::class, 'create'])->middleware('auth');

// Store request Data
Route::post('/requests', [RequestController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/requests/{request}/edit', [RequestController::class, 'edit'])->middleware('auth');

// Update request
Route::put('/requests/{request}', [RequestController::class, 'update'])->middleware('auth');

// Show approve form
Route::get('/requests/{request}/approve', [RequestController::class, 'approve'])->middleware('auth');

// Review request
Route::put('/requests/{request}', [RequestController::class, 'updateStatus'])->middleware('auth');

// Delete request
Route::delete('/requests/{request}', [RequestController::class, 'destroy'])->middleware('auth');

// Manage requests
Route::get('/requests/manage', [RequestController::class, 'manage'])->middleware('auth');

// Single Request
Route::get('/requests/{request}', [RequestController::class, 'show']);

// Show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users',[UserController::class, 'store']);

// Log user out
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);