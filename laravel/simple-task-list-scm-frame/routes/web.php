<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Task;
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

Route::get('/', [TaskController::class, 'showTaskList']);
Route::post('/add-task', [TaskController::class, 'createTaskList']);
Route::get('/edit-task/{id}', [TaskController::class, 'editTaskList']);
Route::get('/delete-task/{id}', [TaskController::class, 'deleteTaskList']);
Route::post('/update-task', [TaskController::class, 'updateTaskList']);
