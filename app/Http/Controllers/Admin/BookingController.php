<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Appointment;
use App\Models\Time;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::where('status',0)->get();
        return view('Admin.appointment.booking', compact('bookings'));
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
    public function rejected_booked($id)
    {
        $booking = Booking::findOrFail($id);
        $appointment = Appointment::where('user_id', $booking->doctor_id)->where('date', $booking->date)->first();
        $time = Time::where('appointment_id', $appointment->id)->where('status', 1)->where('time', $booking->time)->first();

        $time->status = 0;
        $booking->status = 3;

        $time->save();
        $booking->save();

        return redirect()->back()->with('message','Wizyta została odrzucona');
    }
    public function accepted_booked($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 1;

        $booking->save();

        return redirect()->back()->with('message','Wizyta została potwierdzona');
    }
}
