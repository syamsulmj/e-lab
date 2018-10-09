<?php

Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::post('login_checking', 'HomeController@login_checking');
Route::get('register', 'HomeController@register');
Route::post('register/registering', 'HomeController@register_create');
Route::post('/logout', 'HomeController@logout');
Route::get('new-report', 'ReportController@new_report');
Route::post('new-report/create', 'ReportController@create_report');
Route::get('student-report/{matrix_number}/{id}', ['as' => 'student_report', 'uses' => 'ReportController@generate_report']);
Route::get('report_editing/{id}', ['as' => 'report_editing', 'uses' => 'ReportController@report_editing']);
Route::post('update-report/{id}', ['as' => 'update_report', 'uses' => 'ReportController@edit_report']);
Route::post('send2whatsapp', 'ReportController@send2whatsapp');
Route::get('admin-create-account', 'AdminController@create_account');
Route::post('admin-create-account/create-account', 'AdminController@create');
Route::get('lecturer-registered-class', 'AdminController@registered_class');
Route::post('lecturer-registered-class/create', 'AdminController@register_new_class');
Route::delete('lecturer-registered-class/delete/{matrix_number}/{class_name}', ['as' => 'delete_class', 'uses' => 'AdminController@delete_class']);
Route::post('lecturer-registered-class/update/{matrix_number}/{class_name}', ['as' => 'update_class', 'uses' => 'AdminController@update_class']);
Route::get('lecturer-upload-assignment', 'AdminController@upload_assignment');
Route::post('lecturer-upload-assignment/upload-file/{class_name}', ['as' => 'upload_file', 'uses' => 'AssignmentController@store_file']);
Route::get('lecturer-student-reports', 'AdminController@lecturer_students_report');
Route::get('student-profile', 'HomeController@student_profile');
Route::post('student-profile/update-profile', 'HomeController@student_profile_update');
Route::post('student-profile/change-password', 'HomeController@student_password_update');
Route::get('lecturer-profile', 'AdminController@lecturer_profile');
Route::post('lecturer-profile/update-profile', 'AdminController@lecturer_profile_update');
Route::post('admin-change-password', 'AdminController@admin_update_password');
