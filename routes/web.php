<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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


Auth::routes(['verify' => true]);

Route::resource('/', 'HomeController')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>['auth','Administrator']],function() {
    Route::get('/admin/home','Admin\DoctorController@home')->name('admin.home');
    Route::resource('admin/doctor', 'Admin\DoctorController');
    Route::resource('admin/appointment', 'Admin\AppointmentController');
    Route::resource('admin/weekly_appointment', 'Admin\WeeklyAppointmentController');
    Route::resource('admin/Patient', 'Admin\PatientController');
    Route::resource('admin/booking', 'Admin\BookingController');
    Route::resource('admin/Prescription', 'Admin\PrescriptionController');
    Route::resource('admin/generate','Admin\GenerateController');
    Route::resource('admin/card_doctor','Admin\CardDoctorController');

    Route::delete('admin/doctor', 'Admin\DoctorController@delete')->name('admin.doctor.delete');;
    Route::get('admin/booking/rejected_booked/{id}', 'Admin\BookingController@rejected_booked')->name('booking.rejected_booked');
    Route::get('admin/booking/accepted_booked/{id}', 'Admin\BookingController@accepted_booked')->name('booking.accepted_booked');

    Route::post('admin/appointment/check','Admin\AppointmentController@check')->name('appointment.check');
    Route::post('admin/generate/list','Admin\GenerateController@generate')->name('generate.list');

    Route::get('admin/patient/list', 'Admin\PatientController@list')->name('admin.patient.list');

    Route::post('admin/card_doctor/check','Admin\CardDoctorController@check')->name('card_doctor.check');

});


Route::group(['middleware' => ['auth', 'Doctor']], function () {
    Route::resource('doctor/home', 'Doctor\HomeController');
    Route::resource('doctor/patient', 'Doctor\PatientController');
    Route::resource('doctor/patient_today', 'Doctor\PatientTodayController');
});

Route::group(['middleware' => ['auth', 'Patient']], function () {
	Route::resource('patient/new_appointment', 'Patient\AppointmentController');
	Route::resource('patient/cancel_appointment', 'Patient\CancelAppointmentController');
	Route::resource('patient/profile', 'Patient\ProfileController');
	Route::resource('patient/history', 'Patient\HistoryController');

    Route::resource('patient/prescription', 'Patient\PrescriptionController');

	Route::post('patient/new_appointment/doctors', 'Patient\AppointmentController@doctorlist')->name('book.doctorlist');
	Route::post('profile/', 'Patient\ProfileController@changePassword')->name('profile.changePassword');

	Route::get('patient/new_appointment/{doctor}/{time_id}', 'Patient\AppointmentController@showTimes')->name('book.showTimes');
});
