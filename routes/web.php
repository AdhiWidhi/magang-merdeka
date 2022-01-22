<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProjectController::class, 'index']);
Route::get('/create', [ProjectController::class, 'create']);
Route::post('/store', [ProjectController::class, 'store']);
Route::get('/edit/{id}', [ProjectController::class, 'edit']);
Route::put('/update/{id}', [ProjectController::class, 'update']);
Route::delete('/delete/{id}', [ProjectController::class, 'destroy']);
Route::get('/search', [ProjectController::class, 'search']);