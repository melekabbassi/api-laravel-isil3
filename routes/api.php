<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get all employees
Route::get('employees', [EmployeeController::class, 'getEmployee']);
Route::get('employee/{id}',[EmployeeController::class,'getEmployeeById']);
Route::post('addEmployee', [EmployeeController::class, 'addEmployee']);
Route::put('updateEmployee/{id}', [EmployeeController::class, 'updateEmployee']);
Route::delete('deleteEmployee/{id}', [EmployeeController::class, 'deleteEmployee']);