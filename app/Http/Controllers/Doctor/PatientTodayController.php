<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Medicament;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Prescription;
use App\Models\Recommendation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\CloseAppointment;
use Illuminate\Support\Facades\Mail;



class PatientTodayController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$doctor = Auth::user()->getAuthIdentifier();
		$date = date('Y-m-d');
		$patients = Booking::where('date', $date)
			->where('doctor_id', $doctor)
			->where('status', 1)
			->leftJoin('users', 'users.id', '=', 'bookings.user_id')
			->select(
				'bookings.id as id',
				'users.first_name as name',
				'users.last_name as last_name',
				'bookings.date',
				'bookings.time',
				'bookings.symptoms',
				'bookings.status'
			)
			->get();
		return view('doctor.patientToday', compact('patients'));
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
	public function show($id)
	{
		//
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

	public function appointment($id)
	{

		$patient = Booking::where('bookings.id', $id)
			->where('date', date('Y-m-d'))
			->leftJoin('users', 'users.id', '=', 'bookings.user_id')
			->select(
				'bookings.id as id',
				'users.first_name',
				'users.last_name',
				'users.phone_number',
				'users.pesel',
				'users.alergies',
				'users.medicaments',
				'bookings.date',
				'bookings.time',
				'bookings.symptoms',
				'bookings.user_id'
			)
			->first();

		$appointments = Booking::where('user_id', $patient->user_id)
			->where('doctor_id', auth()->user()->id)
			->where('status', 2)
			->get();

		$prescriptions = Prescription::where('id_patient', $patient->user_id)
			->where('id_doctor', auth()->user()->id)
			->get();


		return view('doctor.appointment', compact('patient', 'appointments', 'prescriptions'));
	}

	public function prescription(Request $request)
	{
		$data = $request->all();
		$id_app = $data['id_app'];
		$rand = rand(100000000, 999999999);
		$qr = Str::random(10);

		$booking = Booking::where('id', $id_app)->first();


		$date = date('Y-m-d');

		if (isset($data['isPrescriptionActive'])) {
			if ($data['name1'] != null &&  $data['dosage1'] != null &&  $data['payment1'] != null &&  $data['count1'] != null) {
				Prescription::create([
					'id_patient' => $booking->user_id,
					'id_doctor' => $booking->doctor_id,
					'invoice_date' => $date,
					'access_code' => $rand,
					'barcode' => $qr,
					'implementation_date' => $date,
					'appointment_id' => $id_app
				]);

				$prescript_id = Prescription::all()->last();

				for ($i = 1; $i < 6; $i++) {
					if ($data['name' . $i] != null &&  $data['dosage' . $i] != null &&  $data['payment' . $i] != null &&  $data['count' . $i] != null) {
						Medicament::create([
							'id_prescription' => $prescript_id->id,
							'name' => $data['name' . $i],
							'dosage' => $data['dosage' . $i],
							'payment' => $data['payment' . $i],
							'count' => $data['count' . $i],
						]);
					}
				}
			} else
				return back()->with('errmessage', 'Niepoprawnie wypełniono formularz recept.');
		}




		Recommendation::create([
			'id_patient' => $booking->user_id,
			'id_doctor' => $booking->doctor_id,
			'date' => $date,
			'appointment_id' => $id_app,
			'content' => $data['zalecenia'],
		]);

		$booking->status = 2;
		$booking->save();
		
		$patient = User::where('id',$booking->user_id)->get()->first();
		$doctor = User::where('id',$booking->doctor_id)->get()->first();

		$details = [
            'name' => $patient->first_name,
            'date' => $booking->date,
            'hours' => $booking->time,
            'doctor' => $doctor->first_name." ".$doctor->last_name,
			'prescription' => isset($data['isPrescriptionActive']) ? 1 : 0,
        ];

        Mail::to($patient->email)
            ->send(new CloseAppointment($details));

		return redirect('doctor/patient_today')->with('message', 'Pomyślnie zakończono wizytę');
	}
}
