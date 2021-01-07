<?php

use Illuminate\Support\Facades\{Route, Auth};


// Guest
Route::get('/', 'HomeController@index')->name('/');
Route::get('/details-of-working-hours', 'TeacherController@jamkerja');

Auth::routes();

Route::middleware('guest')->group(function () {

    // Login Admin
    Route::get('/login/admin', 'AdminController@loginAdmin')->name('login.admin');
    Route::post('/login/admin', 'AdminController@postLoginAdmin');

    // Login Guru
    Route::get('/login', 'TeacherController@loginTeacher')->name('login.teacher');
    Route::post('/login', 'TeacherController@postLoginTeacher');
});


// Admin
Route::group(['middleware' => ['auth', 'check.role:admin']], function() {
    Route::get('/admin/dashboard/teacher/list', 'AdminController@admin');
    Route::get('/admin/dashboard/teacher/{id}/details', 'AdminController@details')->name('teacher.details');

    Route::get('/admin/dashboard/teacher/{id}/edit', 'AdminController@edit');
    Route::post('/admin/dashboard/teacher/{id}/update', 'AdminController@update');

    Route::get('/admin/dashboard/working-hours', 'AdminController@working')->name('admin.working.hours');

    // Edit Jam Masuk
    Route::get('/admin/dashboard/working-hours/hour-start/{id}/edit', 'AdminController@editHourStart');
    Route::post('/admin/dashboard/working-hours/hour-start/{id}/update', 'AdminController@updateHourStart');

    // Edit Jam Pulang
    Route::get('/admin/dashboard/working-hours/hour-over/{id}/edit', 'AdminController@editHourOver');
    Route::post('/admin/dashboard/working-hours/hour-over/{id}/update', 'AdminController@updateHourOver');

    Route::get('/admin/dashboard/attendance-list', 'AdminController@attendance');
    Route::get('/admin/dashboard/attendance-list/periode', 'AdminController@filterPeriode');
    Route::get('/admin/dashboard/attendance/{id}/details', 'AdminController@detailAbsen');
    // import
    Route::post('/admin/dashboard/teacher/import', 'AdminController@store')->name('teacher.import');
    // export
    Route::get('/admin/dashboard/attendance/{id}/export/', 'AdminController@exportExcel');

    // ganti password
    Route::get('/admin/dashboard/teacher/{id}/change-password', 'AdminController@editPassword');
    Route::post('/admin/dashboard/teacher/{id}/change-password/update', 'AdminController@updatePassword');

    Route::get('/admin/logout', 'AdminController@logoutAdmin')->name('logout.admin');
});

// Guru
Route::group(['middleware' => ['auth', 'check.role:teacher, admin']], function() {
    Route::get('/teacher/checkin', 'TeacherController@checkin');
    Route::get('/teacher/report-attendance', 'TeacherController@report');

    Route::post('/teacher/attendance', 'TeacherController@attendance');

    Route::get('/teacher/logout', 'TeacherController@logoutTeacher')->name('logout.teacher');
});


