<?php

use App\Http\Controllers\api\EmployeeApiController;
use App\Model\EmployeeList;
use App\Model\EmployeeSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee-lists', [EmployeeApiController::class, 'index']);
Route::get('/employee-lists/{id}', [EmployeeApiController::class, 'getEmployeeID']);
Route::post('/add-employee', [EmployeeApiController::class, 'insert']);
Route::delete('/delete-employee/{id}', [EmployeeApiController::class, 'delete']);
Route::put('/update-employee/{id}', [EmployeeApiController::class, 'update']);
