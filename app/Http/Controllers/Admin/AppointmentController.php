<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\models\Time;
use App\Http\Controllers\Controller;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.appointment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'date'=>'required|unique:appointments,date,NULL,id,user_id,'.$request->doctor_id,
            'time'=>'required',
            'doctor_id'=>'required'
        ]);
        $appointment = Appointment::create([
            'user_id'=> $request->doctor_id,
            'date' => $request->date
        ]);
        foreach ($request->time as $time) {
            Time::create([
                'appointment_id'=>$appointment->id,
                'time'=>$time,
                'status'=>0
            ]);
        }
        return redirect()->back()->with('message', 'Utworzono wizyte na dzień '.$request->date);
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

    public function check(Request $request){
        $date = $request->date;
        $appointment = Appointment::where('date', $date)->where('user_id',$request->doctor_id)->first();

        if(!$appointment){
            return redirect()->to('/admin/appointment')->with('errmessage','Nie znaleziono wizyt dla tej daty oraz lekarza');
        }
        $appointmentID=$appointment->id;
        $times = Time::where('appointment_id',$appointmentID)->get();
        return view('Admin.appointment.index',compact('times','appointmentID','date'));
    }

}
