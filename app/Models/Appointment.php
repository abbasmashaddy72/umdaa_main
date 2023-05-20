<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'doctor_id',
        'patient_id',
        'referral_id',
        'date',
        'time',
        'status'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function doctorSchedule()
    {
        return $this->belongsTo(DoctorSchedule::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }

    public function vitals()
    {
        return $this->belongsToMany(Vital::class);
    }
}
