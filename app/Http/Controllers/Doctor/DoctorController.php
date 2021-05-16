<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    public function index()
    {
        $doctor = Auth::user()->getAuthIdentifier();
        $date = date('Y-m-d');
        $users = Booking::where('date',$date)
            ->where('doctor_id',$doctor)
            ->where('status',0)
            ->leftJoin('users','users.id' ,'=' ,'bookings.user_id')
            ->select('users.first_name as name', 'users.last_name as last_name',
                'bookings.date','bookings.time', 'bookings.symptoms', 'bookings.status' )
            ->get();
        return view('doctor.list', compact('users'));
    }

    public function amount()
    {
        $doctor = Auth::user()->getAuthIdentifier();
        $date = date('Y-m-d');
        $amount = Booking::where('date',$date)
            ->where('doctor_id',$doctor)
            ->count();

        return view('doctor.home', compact('amount'));
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
    public function show(Request $request)
    {
        $doctor = Auth::user()->getAuthIdentifier();
        $date = date('Y-m-d');
        $users = Booking::where('date',$date)
            ->where('doctor_id',$doctor)
            ->where('status',1)
            ->leftJoin('users','users.id' ,'=' ,'bookings.user_id')
            ->select('users.first_name as name', 'users.last_name as last_name',
                'bookings.date','bookings.time', 'bookings.symptoms', 'bookings.status' )
            ->get();
        return view('doctor.list', compact('users'));
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
