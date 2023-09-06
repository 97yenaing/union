<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientsController;

use App\Providers\AppServiceProvider;

use Maatwebsite\Excel\Facades\Excel;




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


Route::get('/', function () {
    return view('welcome');
});

Route::get('Admin/Register', [AdminController::class, 'register_view']);
Route::post('Admin/Register', [AdminController::class, 'admin_do'])->name('admin_road');

Route::get('Patients/pt_process', [PatientsController::class, 'patients_view']);
Route::post('Patients/pt_process', [PatientsController::class, 'patients_process'])->name('pt_data');

Route::get('Admin/viewUser', [AdminController::class, 'user_view']);
Route::post('Admin/viewUser', [AdminController::class,'user_process'])->name('user_viewList');




Route::get('Patients/export', [PatientsController::class, 'export_patient']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

