<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
		return view('Admin.doctor.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('Admin.doctor.create');
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
		return view('Admin.doctor.edit', compact('user'));
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
			'address' => 'required',
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
					'address' => $request->address,
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
			'address' => 'required',
			'phone_number' => 'required|numeric',
			'role_id' => 'required',
			'description' => 'required',
			'specialist' => 'required',
			'image' => 'required'
		]);
	}
}
