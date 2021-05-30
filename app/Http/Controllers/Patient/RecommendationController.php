<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Recommendation;

class RecommendationController extends Controller
{
    public function index()
    {
        $appointments = Booking::where('user_id', auth()
            ->user()->id)
            ->where('status',2)
            ->leftjoin('users','users.id','bookings.doctor_id')
            ->select('bookings.id','users.specialist','users.first_name',
                'users.last_name','bookings.date','bookings.time')
            ->get();

        $appointments = $appointments->sortDesc();

        return view('patient.recommendation',compact('appointments'));
    }
}
