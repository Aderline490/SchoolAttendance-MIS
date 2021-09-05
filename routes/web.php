<?php

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

Route::post('login', 'Auth\LoginController@postLogin')->name('login');
Route::get('dashboard', 'AdminController@index')->name('admin');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/students', 'StudentController');

    Route::get('/sattendance', 'StudentAttendanceController@index')->name('sattendance');
    Route::get('/latetime', 'AttendanceController@indexLatetime')->name('indexLatetime');
    Route::get('/sleave', 'StudentLeaveController@index')->name('sleave');

});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/teachers', 'TeacherController');
    
    Route::get('/tattendance', 'TeacherAttendanceController@index')->name('tattendance');
    Route::get('/latetime', 'AttendanceController@indexLatetime')->name('indexLatetime');
    Route::get('/leave', 'LeaveController@index')->name('leave');

});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/students', 'StudentController', ['only' => [
        'show', 'index',
    ]]);

});

Route::get('/sattendance/assign', function () {
    return view('includes.add_student_attendance');
})->name('attendance.login');


Route::post('/sattendance/assign', 'StudentAttendanceController@assign')->name('sattendance.assign');


Route::get('/sleave/assign', function () {
    return view('includes.add_student_attendance');
})->name('leave.login');

Route::post('/sleave/assign', 'StudentLeaveController@assign')->name('sleave.assign');
