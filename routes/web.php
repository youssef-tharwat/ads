<?php

//Guest Routes

Route::get('/', function () {
    return redirect()->route('login');
});

// Admin - Student Routes

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');

// Admin Routes

Route::get('/dashboard/course-management/assign-subject', 'admin\SubjectController@index')->name('subject.view');
Route::post('/dashboard/course-management/store-subject', 'admin\SubjectController@store')->name('subject.store');

Route::get('/dashboard/course-management/assign-exam', 'admin\ExamController@index')->name('exam.view');
Route::post('/dashboard/course-management/store-exam', 'admin\ExamController@store')->name('exam.store');

Route::get('/dashboard/user-management', 'admin\UserManagementController@index')->name('user.view');
Route::post('/dashboard/user-management', 'admin\UserManagementController@store')->name('user.store');

Route::get('/dashboard/logfile', 'admin\LogFileController@index')->name('log.view');

Route::get('/dashboard/take-attendance', 'admin\TakeAttendanceController@index')->name('take.attendance.view');
Route::get('/dashboard/take-attendance/{id}', 'admin\TakeAttendanceController@show')->name('take.attendance.show');
Route::get('/dashboard/take-attendance/{id}/student', 'admin\TakeAttendanceController@edit')->name('take.attendance.edit');

// Student Routes

Route::get('/dashboard/view-attendance', 'student\ViewAttendanceController@index')->name('view.attendance.view');

Route::get('/dashboard/view-exams', 'student\ViewExamsController@index')->name('view.exams.view');

// 2fa
Route::post('2fa', 'TwoFactorController@verifyTwoFactor');
Route::post('2fa-s', 'TwoFactorControllerStudents@verifyTwoFactor');


