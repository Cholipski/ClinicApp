<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Models\Time;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Datetime;

class WeeklyAppointmentController extends Controller
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
        return view('admin.appointment.weekly');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = array();
        $date_array = array();
        $date = explode('-',str_replace(' ','',$request->daterange));
        $period = new \DatePeriod(
            new \DateTime($date[0]),
            new \DateInterval('P1D'),
            new \DateTime($date[1]),
        );

        foreach ($period as $key=> $value){
            if($request->weekend == 'on'){
                if(date('N', strtotime($value->format('d-m-Y')))< 6){
                    $date_array[] = $value->format('Y-m-d');
                }
            }
            else{
                $date_array[] = $value->format('Y-m-d');
            }
        }

        foreach ($date_array as $item) {
            $this->validate($request,[
                'time'=>'required',
                'doctor_id'=>'required'
            ]);

            $taken = Appointment::where('date',$item)->where('user_id',$request->doctor_id)->get();

            if(count($taken) == 0){
                $appointment = Appointment::create([
                    'user_id'=> $request->doctor_id,
                    'date' => $item
                ]);
                foreach ($request->time as $time) {
                    Time::create([
                        'appointment_id'=>$appointment->id,
                        'time'=>$time,
                        'status'=>0
                    ]);
                }
            }
            else{
                $user = User::where('id',$request->doctor_id)->get();
                $errors[] = $item.' dla lekarza '.$user[0]->first_name.' '.$user[0]->last_name.' jest już zajęty';
            }

        }
        if(count($errors) == 0){
            return redirect()->back()->with('message', 'Poprawnie dodano wszystkie terminy '.$request->daterange);
        }
        else{
            return redirect()->back()->withErrors($errors);

        }
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
