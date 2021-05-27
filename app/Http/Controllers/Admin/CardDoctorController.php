<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Time;
use App\Models\User;
use App\Http\Controllers\Admin\Carbon;
use App\Models\Prescription;

class CardDoctorController extends Controller
{
    public function index()
    {
        return view('admin.doctor.card_doctor');
    }
    public function check(Request $request)
    {
        $doctorID = $request->doctor_id;
        $patients = Booking::where('doctor_id', $doctorID)
            ->leftjoin('users','users.id','bookings.user_id')
            ->select('users.id','users.first_name', 'users.last_name','users.email','users.address','users.phone_number')
            ->groupBy('id')
            ->get();

        $doctor_selected = User::where('id', $doctorID)->first();

        $date = date('Y-m-d');
        $appoinments = Booking::all()->where('date', '<' ,$date)->where('doctor_id', $doctorID)->sortByDesc('date')->take(10);

        $prescriptions = Prescription::where('id_doctor', $doctorID)->get();

        return view('admin.doctor.card_doctor',compact('patients', 'doctor_selected', 'appoinments', 'prescriptions'));
    }
}
