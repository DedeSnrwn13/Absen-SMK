<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard/teacher/list', 'AdminController@index');
Route::get('/admin/dashboard/teacher/details', 'AdminController@details');

Route::get('/admin/dashboard/working-hours', 'AdminController@working');

Route::get('/admin/dashboard/attendance-list', 'AdminController@attendance');
Route::get('/admin/dashboard/attendance/details', 'AdminController@detailAbsen');


Route::get('signin/teacher', 'TeacherController@login');

