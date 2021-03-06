<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Doctor;
use App\Models\Medicament;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions = Prescription::where('id_patient',auth()->user()->id)
            ->leftjoin('users','users.id','prescriptions.id_doctor')
            ->select('prescriptions.id as id','prescriptions.invoice_date as invoice_date','prescriptions.access_code as code',
                'prescriptions.barcode','prescriptions.implementation_date as implementation_date',
                'users.first_name as first_name','users.last_name as last_name')
            ->get();
        return view('patient.prescription',compact('prescriptions'));
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
        $prescription = Prescription::where('id_patient',auth()->user()->id)
            ->where('id',$id)
            ->get()
            ->first();
        $patient = User::where('id',$prescription->id_patient)->get()->first();
        $doctor = User::where('id',$prescription->id_doctor)->get()->first();
        $medicaments = Medicament::where('id_prescription',$prescription->id)->get();
        return view('patient.prescriptionDetail',compact('prescription',
            'patient','doctor','medicaments'));
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
