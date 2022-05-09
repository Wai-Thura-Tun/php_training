<?php

use App\Model\EmployeeList;
use App\Model\EmployeeSalary;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', [EmployeeController::class,'showEmployeeList'])->name('home');
Route::get('/edit-employee/{id}', [EmployeeController::class,'editEmployeeList'])->name('edit');
Route::get('/delete-employee/{id}', [EmployeeController::class,'deleteEmployeeList'])->name('delete');
Route::post('/update-employee/{id}/{eid}', [EmployeeController::class,'updateEmployeeList'])->name('update');
Route::get('/create-employee', function(){
    return view('input');
})->name('create');
Route::post('/create-employee',[EmployeeController::class,'addEmployeeList'])->name('add');
Route::get('/import-employee', function(){
    return view('file');
})->name('import');
Route::get('employees/export/', [EmployeeController::class, 'export'])->name('empexport');
Route::post('employees/import/', [EmployeeController::class, 'import'])->name('empimport');



