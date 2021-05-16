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
        $bookings = Booking::all()->where('date', $date);

        return view('admin.patient.generate',compact('bookings'));
    }

    public function generate(Request $request){
        $doctor = $request->doctor_id;
        $date = date('Y-m-d');
        $bookings = Booking::all()->where('date', $date)->where('doctor_id', $doctor)->sortBy('time');

        if($bookings->count() == 0){
            return redirect()->to('/admin/generate')->with('errmessage','Nie znaleziono wizyt dla wybanego lekarza');
        }
        $pdf = PDF::loadview('admin.patient.patient_list', compact('bookings'));
        return $pdf->download('lista_pacjentów.pdf');

    }
}
