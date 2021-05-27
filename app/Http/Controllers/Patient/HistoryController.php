<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class HistoryController extends Controller
{
    public function index()
    {
        $appointments = Booking::where('user_id', auth()
            ->user()->id)
            ->leftjoin('users','users.id','bookings.doctor_id')
            ->select('bookings.id','users.specialist','users.first_name',
                'users.last_name', 'bookings.symptoms', 'bookings.date','bookings.time','bookings.status')
            ->get()
            ->sortBy('date');
        
        return view('patient.history',compact('appointments'));
    }
}
