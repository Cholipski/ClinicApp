<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_patient',
        'id_doctor',
        'invoice_date',
        'access_code',
        'barcode',
        'implementation_date',
        'appointment_id'
    ];

}
