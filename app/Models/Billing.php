<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'procedure_id',
        'patient_id',
        'discount',
        'round_off',
        'mode_of_payment'
    ];

    public function appointment()
    {
        return $this->patient->appointments();
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }
}
