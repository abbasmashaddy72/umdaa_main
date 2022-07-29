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
        'registration_no',
        'department_id',
        'registration_fee',
        'consultation_fee',
        'review_ink',
        'about',
        'career_start_date'
    ];

    public function getDoctorAttribute()
    {
        return $this->name . ', ' . $this->department->name;
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
