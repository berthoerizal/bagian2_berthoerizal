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
Route::get('/employees/create', [EmployeeController::class, 'create']);
Route::post('/employees', [EmployeeController::class, 'store']);
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);
Route::get('/employees/search_employees', [EmployeeController::class, 'search_employees']);
Route::get('/employees/pdf', [EmployeeController::class, 'createPDF']);

Route::post('/employees/import', [EmployeeController::class, 'import'])->name('import_employees');

Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
Route::get('/companies/create', [CompanyController::class, 'create']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit']);
Route::put('/companies/{id}', [CompanyController::class, 'update']);
Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);
Route::get('/companies/search_company', [CompanyController::class, 'search_company']);
Route::get('/companies/{company_id}/pdf', [CompanyController::class, 'createPDF']);

Auth::routes(['register' => false]);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
