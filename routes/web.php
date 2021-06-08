<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/employees/index' , [EmployeesController::class,'index']);
// Route::get('/employees/create' , [EmployeesController::class,'create']);
// Route::post('/create' , [EmployeesController::class,'store']);
Route::resource('/employees' , EmployeesController::class);

// Route::resource('employees', 'EmployeesController');
// Route::get('/employees', 'App\Http\Controllers\EmployeesController@index');
// Route::get('/employees', 'App\Http\Controllers\EmployeesController@create');
// Route::get('/employees', 'App\Http\Controllers\EmployeesController@store');
