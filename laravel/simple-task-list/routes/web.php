<?php

use App\Http\Controllers\TaskListController;
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

Route::get('/', [TaskListController::class, 'index']);
Route::get('/edit-task/{id}', [TaskListController::class, 'edit']);
Route::get('/delete-task/{id}', [TaskListController::class, 'delete']);
Route::post('/update-task', [TaskListController::class, 'update']);
Route::post('/add-task', [TaskListController::class , 'insert']);
