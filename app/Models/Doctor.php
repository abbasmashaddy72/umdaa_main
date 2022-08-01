<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'locality_id',
        'gender',
        'dob',
        'contact_no',
        'qualification',
        'registration_no',
        'department_id',
        'registration_fee',
        'consultation_fee',
        'review_link',
        'about',
        'career_start_date'
    ];

    public function getDoctorAttribute()
    {
        return $this->name . ', ' . $this->qualification;
    }

    public function getDoctorNumberAttribute()
    {
        return $this->name . ', ' . $this->contact_no;
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
