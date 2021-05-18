<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient/profile');
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
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required'
        ]);
        User::where('id',auth()->user()->id)
            ->update(
                [
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'phone_number'=>$request->phone_number,
                    'address'=>$request->address,
                    'alergies'=>$request->alergies,
                    'medicaments'=>$request->medicaments,

                ]
            );
        return redirect()->back()->with('message','Pomyślnie zmieniono dane');
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

    public function changePassword(Request $request){

        $this->validate($request,[
            'old_password'=>'required',
            'new_password'=>'required',
            're_password'=>'required',
        ]);

        if($request->new_password != $request->re_password){
            return redirect()->back()->with('errmessage','Hasła nie są identyczne');
        }

        if(!Hash::check($request->old_password,auth()->user()->password)){
            return redirect()->back()->with('errmessage','Aktualne hasło jest niepoprawne');

        }

        User::where('id',auth()->user()->id)
            ->update(
                [
                    'password'=>bcrypt($request->new_password),
                ]
            );

        return redirect()->back()->with('message','Pomyślnie zmieniono hasło');


    }
}
