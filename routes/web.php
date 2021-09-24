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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/students', 'StudentController');
    
    Route::get('/sattendance', 'StudentAttendanceController@index')->name('sattendance');
    Route::post('/sattendance/assign', 'StudentAttendanceController@assign')->name('sattendance.assign');
    Route::get('/sleave', 'StudentLeaveController@index')->name('sleave');
    Route::post('/sleave/assign', 'StudentLeaveController@assign')->name('sleave.assign');

});



Route::group(['middleware' => ['auth']], function () {
    Route::resource('/teachers', 'TeacherController');
    
    Route::get('/tattendance', 'TeacherAttendanceController@index')->name('tattendance');
    Route::post('/tattendance/assign', 'TeacherAttendanceController@assign')->name('tattendance.assign');
    Route::get('/tleave', 'TeacherLeaveController@index')->name('tleave');
    Route::post('/tleave/assign', 'TeacherLeaveController@assign')->name('tleave.assign');
    
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/students', 'StudentController', ['only' => [
        'show', 'index',
        ]]);
    });
    
Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('/schedule', 'ScheduleController');

});
Route::group(['middleware' => ['auth']], function () {
    
    Route::post('/updateProfile', 'AdminController@update')->name('admin.update');
    
    Route::get('dashboard', 'AdminController@index')->name('admin');
});