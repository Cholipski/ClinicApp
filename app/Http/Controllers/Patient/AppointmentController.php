<?php

namespace App\Http\Controllers\Patient;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Time;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Symfony\Component\Translation\t;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.appointment');
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
        $appointment_time = Time::where('id',$request->available_time)->get()->first();
        if($appointment_time->status != 0){
            return redirect()->back()->with('errmessage','Wybrana wizyta jest już zajęta');
        }

        $date = Appointment::where('id',$appointment_time->appointment_id)->get()->first();

        if(Booking::where('date',$date->date)->get()->first() != null){
            return redirect()->back()->with('errmessage','Nie można zarezerować dwóch terminów na ten sam dzień');

        }

        Booking::create([
            'user_id'=>auth()->user()->id,
            'doctor_id'=> $request->doctor_id,
            'date'=> $date->date,
            'time'=>$appointment_time->time,
            'symptoms'=>$request->symptomps,
            'status'=>0
        ]);

        Time::where('id',$request->available_time)->update(['status'=>1]);
        return redirect('/')->with('message','Pomyślnie zarezerwowano wizytę');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dates = Appointment::where('user_id',$id)
            ->orderby('date','asc')
            ->whereDate('date','>=',Carbon::today()->toDateString())
            ->simplePaginate(10);
        $doctor = User::where('id',$id)->get()->first();
        return view('patient.availableAppointment',compact('dates','id','doctor'));

    }

    public function showTimes($doctor,$date){
        $doctor = User::where('id',$doctor)->get()->first();

        $date = Appointment::where('date',$date)->where('user_id',$doctor->id)->get()->first();

        $times = Time::where('appointment_id',$date->id)->where('status',0)->get();
        if(count($times)==0){
            return redirect()->back()->with('errmessage','Nie znaleziono wolnych terminów na ten dzień');
        }

        return view('patient.availableAppointment',compact('doctor','times','date'));

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

    public function doctorlist(Request $request){
        $doctors = User::where('specialist',$request->specjalist)->where('role_id',1)->get();
        return view('patient.appointment',compact('doctors'));

    }
}
