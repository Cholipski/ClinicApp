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


Auth::routes();
Route::resource('/', 'HomeController')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>['auth','Administrator']],function() {
    Route::get('/admin/home', function () {
        return view('admin.home');
    });
    Route::resource('admin/doctor', 'Admin\DoctorController');
    Route::resource('admin/appointment', 'Admin\AppointmentController');
    Route::resource('admin/weekly_appointment', 'Admin\WeeklyAppointmentController');
    Route::resource('admin/patient', 'Admin\PatientController');

    Route::post('admin/appointment/check','Admin\AppointmentController@check')->name('appointment.check');

});

Route::group(['middleware'=>['auth','Doctor']],function() {
    Route::get('/doctor/home', function () {
        return view('doctor.home');
    });

});

Route::group(['middleware'=>['auth','Patient']],function() {
    Route::resource('patient/new_appointment', 'Patient\AppointmentController');
    Route::resource('patient/cancel_appointment', 'Patient\CancelAppointmentController');
    Route::resource('patient/profile', 'Patient\ProfileController');


    Route::post('patient/new_appointment/doctors','Patient\AppointmentController@doctorlist')->name('book.doctorlist');
    Route::post('profile/','Patient\ProfileController@changePassword')->name('profile.changePassword');

    Route::get('patient/new_appointment/{doctor}/{time_id}','Patient\AppointmentController@showTimes')->name('book.showTimes');



});

