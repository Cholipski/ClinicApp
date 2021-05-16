<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use PDF;

class GenerateController extends Controller
{
    public function index()
    {
        $patients = User::where('role_id',3)->get();
        return view('admin.patient.generate',compact('patients'));
    }
    public function PDFgenerator()
    {
        $patients = User::where('role_id',3)->get();
        $pdf = PDF::loadview('admin.patient.patient_list', compact('patients'));
        return $pdf->download('lista_pacjentów.pdf');
    }
}
