<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/student_add',[HomeController::class,'student_add'])->name('add');
Route::get('/student-edit/{s_id}',[HomeController::class,'studentEdit'])->name('student.edit');
Route::post('/student-update',[HomeController::class,'studentUpdate'])->name('student.update');
Route::get('/student-delete/{s_id}',[HomeController::class,'studentDelete'])->name('student-delete');




Route::get('/department',[DepartmentController::class,'index'])->name('department');
Route::post('/department-add',[DepartmentController::class,'addDepartment'])->name('department.add');
Route::get('/department-edit/{dept_id}',[DepartmentController::class,'getDepartmentById'])->name('department.edit');
Route::post('/department-update',[DepartmentController::class,'updateDepartment'])->name('department.update');
Route::get('/department-delete/{dept_id}',[DepartmentController::class,'deleteDepartment'])->name('department.delete');
