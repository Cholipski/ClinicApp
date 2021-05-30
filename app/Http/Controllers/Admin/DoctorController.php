<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::where('role_id', 1)->get();
		return view('admin.doctor.index', compact('users'));
	}

    public function home()
    {
        $doctor_amount = User::where('role_id',1)->count();
        $users_amount = User::where('role_id',3)->count();
        $amount = Booking::where('date',date('Y-m-d'))->count();
        $amount_appointments = Booking::where('date',date('Y-m-d'))->where('status',0)->count();


        $patient = Booking::where('date',date('Y-m-d'))
            ->where('status',0)
            ->join('users','users.id' ,'=' ,'bookings.user_id')
            ->select('users.first_name as name', 'users.last_name as last_name',
                'bookings.date as date','bookings.time as time', 'bookings.doctor_id as doc' , 'users.id as idp'  )
            ->get();
        $doctor = Booking::where('date',date('Y-m-d'))
            ->where('status',0)
            ->rightJoin('users','users.id' ,'=' ,'bookings.doctor_id')
            ->select('users.first_name as doctor_name', 'users.last_name as doctor_last_name' , 'users.id as idd')
            ->get();


        return view('admin.home',compact('users_amount', 'doctor_amount', 'amount', 'amount_appointments','patient','doctor'));
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.doctor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$this->validateStore($request);

		$data = $request->all();
		$name = (new User)->userAvatar($request);
		$data['image'] = $name;
		$data['password'] = bcrypt($request->password);
		User::create($data);
		return redirect()->back()->with('message', 'Pomyślnie dodano lekarza');
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
		$user = User::findOrFail($id);
		return view('admin.doctor.edit', compact('user'));
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
		$validator = Validator::make($request->all(), [
			'first_name' => 'required',
			'last_name' => 'required',
			'education' => 'required',
			'room' => 'required',
			'phone_number' => 'required|numeric',
			'description' => 'required'
		]);
		if ($validator->fails()) {
			return redirect()->back()->with('errmessage', 'Edycja danych nie powiodła się');
		}
		User::where('id', $id)
			->update(
				[
					'first_name' => $request->first_name,
					'last_name' => $request->last_name,
					'education' => $request->education,
					'room' => $request->room,
					'phone_number' => $request->phone_number,
					'description' => $request->description,
				]
			);
		return redirect()->back()->with('message', 'Pomyślnie zmieniono dane');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	}
	public function delete(Request $request)
	{
	    //
	}

	public function validateStore($request)
	{
		return $this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|unique:users',
			'password' => 'required|min:6|max:25',
			'gender' => 'required',
			'education' => 'required',
			'room' => 'required',
			'phone_number' => 'required|numeric',
			'role_id' => 'required',
			'description' => 'required',
			'specialist' => 'required',
			'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048'
		    ],
            [
                'first_name.required'=>'Imię jest wymagane',
                'last_name.required'=>'Nazwisko jest wymagane',
                'email.required'=>'Pole email jest wymagane',
                'email.unique'=>'Istnieje konto z takim adresem email',
                'password.required'=>'Hasło jest wymagane',
                'password.min'=>'Minimalna liczba znaków to 6',
                'password.max'=>'Maksymalna liczba znaków to 25',
                'gender.required'=>'Płeć jest wymagana',
                'education.required'=>'Wykształcenie jest wymagane',
                'room.required'=>'Pokój lekarza jest wymagany',
                'phone_number.required'=>'Telefon jest wymagany',
                'phone_number.numeric'=>'Telefon może zawierać jedynie cyfry',
                'role_id.required'=>'Wskaż uprawnienia',
                'description.required'=>'Opis lekarza jest wymagany',
                'specialist.required'=>'Specjalizacja lekarza jest wymagana',
                'image.required'=>'Zdjęcie jest wymagane',

            ]
        );
	}
}
