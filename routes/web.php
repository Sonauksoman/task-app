<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;


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
Route::get('/', [LoginController::class, 'loginView']);
Route::post('/', [LoginController::class, 'loginSubmit']);

Route::get('/register', [RegisterController::class, 'registerView']);
Route::post('/register', [RegisterController::class, 'registerSubmit']);


Route::middleware('auth')->prefix('/task')->group(function () {
  Route::get('/', [TaskController::class, 'taskView']);
  Route::get('/create', [TaskController::class, 'taskForm']);
  Route::post('/create', [TaskController::class, 'taskSubmit']);
  Route::get('/view/{id}', [TaskController::class, 'singleTask']);
  Route::post('/view/{id}', [TaskController::class, 'updateTask']);
  Route::get('/delete/{id}', [TaskController::class, 'deleteTask']);
  Route::get('/profile', [TaskController::class, 'profileView']);
  Route::get('/logout', [TaskController::class, 'logout']);
});





