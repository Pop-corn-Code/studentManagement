<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth route
Route::get('login-form', function(){
    return view('auth.login');
})->name('login.form');
Route::get('register-form', function(){
    return view('auth.register');
})->name('register.form');
Route::post('register-data', [UserController::class, 'register'])->name('user.register');

Route::get('student', function(){
    return view('student-board');
})->name('student');

Route::post('login-data', [UserController::class, 'login'])->name('login.data');
// LoG-OUT
Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/', function () {
     if(session("email")){
        return view('welcome');
    }else{
        return view('home');
    }
});
Route::get('add-std', function(){
    return view('add-std-form');
})->name('add.std');
Route::post('/add-std-info', [StudentController::class, 'store'])->name("std.store");
Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/edit-std/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/update-std/{student}', [StudentController::class, 'update'])->name('students.update');
Route::get('/dlt-std/{id}', [StudentController::class, 'delete'])->name('students.dlt');
//student settings
ROute::get('/std/settings={id}', [StudentController::class, 'setting'])->name('student.setting');
// TAKE ATTENDANCE
Route::post('/attendance', [AttendanceController::class, 'call'])->name('call');
Route::post('/take/attendance/{semester}', [AttendanceController::class, 'take_attendance'])->name('call.students');
// Route::get('call-')