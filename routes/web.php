<?php

use Illuminate\Support\Facades\{Route, Auth};

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

Auth::routes();

// guest
Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard/teacher/list', 'AdminController@index');
    Route::get('/admin/dashboard/teacher/details', 'AdminController@details');

    Route::get('/admin/dashboard/working-hours', 'AdminController@working');

    Route::get('/admin/dashboard/attendance-list', 'AdminController@attendance');
    Route::get('/admin/dashboard/attendance/details', 'AdminController@detailAbsen');
});

// Guru
Route::group(['middleware' => ['role:teacher']], function () {
    Route::get('/teacher/checkin', 'TeacherController@checkin');
    Route::get('/teacher/report', 'TeacherController@report');
});


