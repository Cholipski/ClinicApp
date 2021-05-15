<?php

namespace App\Http\Controllers\Patient;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CancelAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Booking::where('user_id', auth()
            ->user()->id)
            ->where('status',0)
            ->orWhere('status',1)
            ->leftjoin('users','users.id','bookings.doctor_id')
            ->select('bookings.id','users.specialist','users.first_name',
                'users.last_name','bookings.date','bookings.time','bookings.status')
            ->get();

        return view('patient.cancelAppointment',compact('appointments'));
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
        $appointment = Booking::where('id',$request->appointment_id)->get()->first();
        $time = strtotime($appointment->date." ".$appointment->time);

        if($time < time() + (60*60*24)){
            return redirect()
                ->back()
                ->with('errmessage','Wizytę można odwołać najpóźniej na 24 godziny przed wyznaczonym terminem');
        }

        $appointment_id = Appointment::where('date',$appointment->date)->get()->first()->id;


        Time::where('appointment_id',$appointment_id)->where('time',$appointment->time)->update(['status'=>1]);
        Booking::where('id',$request->appointment_id)->update(['status'=>3]);
        return redirect()
            ->back()
            ->with('message','Pomyślnie odwołano wizytę');

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
}
