<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Http\Controllers\Admin\Carbon;
use PDF;

class GenerateController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        $bookings = Booking::all()->where('date', $date)->where('status', 1);

        return view('admin.patient.generate',compact('bookings'));
    }

    public function generate(Request $request){
        $doctor_id = $request->doctor_id;
        $doctor = User::where('id', $doctor_id)->get()->first();

        $date = date('Y-m-d');
        $bookings = Booking::all()->where('date', $date)->where('doctor_id', $doctor_id)->where('status', 1)->sortBy('time');

        if($bookings->count() == 0){
            return redirect()->to('/admin/generate')->with('errmessage','Nie znaleziono wizyt dla wybanego lekarza');
        }
        $pdf = PDF::loadview('admin.patient.patient_list', compact('bookings', 'date', 'doctor'));
        return $pdf->download('lista_pacjentów.pdf');

    }
}
