<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [ContactController::class,'index']);
Route::get('/', [CategoryController::class,'showForm']);
Route::post('/confirm', [ContactController::class,'confirm']); 
Route::post('/thanks', [ContactController::class,'thanks']); 

Route::get('/register', [AuthController::class,'showRegisterForm']);
Route::post('/register', [AuthController::class,'register']);

Route::get('/login', [AuthController::class,'showloginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
});