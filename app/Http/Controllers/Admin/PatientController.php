<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class PatientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$patients = User::where('role_id', 3)->get();

		return view('admin.patient.index', compact('patients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list()
	{
		$bookings = Booking::where('status', 2)
			->leftJoin('users as patient', 'patient.id', '=', 'bookings.user_id')
			->leftJoin('users as doctor', 'doctor.id', '=', 'bookings.doctor_id')
			->leftJoin('recommendations', 'recommendations.appointment_id', '=', 'bookings.id')
			->select(
				'patient.first_name as patientName',
				'patient.last_name as patientLastName',
				'doctor.first_name as doctorName',
				'doctor.last_name as doctorLastName',
				'recommendations.content as recommendation',
				'bookings.id',
				'bookings.date',
				'bookings.time',
				'bookings.symptoms',
				'bookings.status'
			)
			->get();

		return view('admin.patient.list', compact('bookings'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */



	public function show(int $id)
	{
		$bookings = Booking::where('id', $id)
			->select('bookings.id', 'bookings.user_id', 'bookings.doctor_id', 'bookings.date', 'bookings.time', 'bookings.symptoms')
			->get();

		$patients = Booking::where('user_id', $bookings->first()->user_id)
			->join('users', 'users.id', '=', 'bookings.user_id')
			->select('users.first_name as name', 'users.last_name as last_name')
			->get();
		$doctor = Booking::where('doctor_id', $bookings->first()->doctor_id)
			->join('users', 'users.id', '=', 'bookings.doctor_id')
			->select('users.first_name as name', 'users.last_name as last_name')
			->get();

		$prescript = Prescription::where('id_doctor', $bookings->first()->doctor_id)
			->where('id_patient', $bookings->first()->user_id)
			->where('invoice_date', $bookings->first()->date)
			->get();

		return view('admin.patient.listDetail', compact('bookings', 'prescript', 'patients', 'doctor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
