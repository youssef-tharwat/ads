<?php

//Guest Routes

Route::get('/', function () {
    return redirect()->route('login');
});

// Admin - Student Routes

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::post('/dashboard/upload-picture', 'HomeController@upload')->name('upload.avatar');
Route::get('/dashboard/user-profile/{id}', 'HomeController@view')->name('profile.view');

// Admin Routes

Route::get('/dashboard/course-management/assign-subject', 'admin\SubjectController@index')->name('subject.view');
Route::post('/dashboard/course-management/store-subject', 'admin\SubjectController@store')->name('subject.store');

Route::get('/dashboard/course-management/assign-exam', 'admin\ExamController@index')->name('exam.view');
Route::post('/dashboard/course-management/store-exam', 'admin\ExamController@store')->name('exam.store');

Route::get('/dashboard/user-management', 'admin\UserManagementController@index')->name('user.view');
Route::post('/dashboard/user-management', 'admin\UserManagementController@store')->name('user.store');

Route::get('/dashboard/logfile', 'admin\LogFileController@index')->name('log.view');
Route::get('/dashboard/logfile/export/excel', 'admin\LogFileController@exportExcel')->name('log.export.excel');
Route::get('/dashboard/logfile/export/csv', 'admin\LogFileController@exportCsv')->name('log.export.csv');

Route::get('/dashboard/take-attendance', 'admin\TakeAttendanceController@index')->name('take.attendance.view');
Route::get('/dashboard/take-attendance/{id}', 'admin\TakeAttendanceController@show')->name('take.attendance.show');
Route::get('/dashboard/take-attendance/{id}/student', 'admin\TakeAttendanceController@edit')->name('take.attendance.edit');

// Student Routes

Route::get('/dashboard/view-attendance', 'student\ViewAttendanceController@index')->name('view.attendance.view');
Route::get('/dashboard/view-exams', 'student\ViewExamsController@index')->name('view.exams.view');
Route::get('/dashboard/view-exams/generate-pdf/{id}/{exam_id}', 'student\ViewExamsController@generatePDF')->name('generate.exam.pdf');

// 2fa

Route::post('2fa', 'TwoFactorController@verifyTwoFactor');
Route::post('2fa-s', 'TwoFactorControllerStudents@verifyTwoFactor');


//2fa Send Code Admin

Route::get('/dashboard/sendcode-admin', 'TwoFactorControllerButton@index')->name('send.code.admin');
Route::get('/dashboard/sendcode-student', 'TwoFactorControllerStudentButton@index')->name('send.code.student');


