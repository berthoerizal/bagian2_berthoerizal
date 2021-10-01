<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
Route::get('/company/create', [CompanyController::class, 'create']);
Route::post('/company/store', [CompanyController::class, 'store']);
