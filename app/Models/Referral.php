<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'qualification',
        'department_id',
        'clinic_name',
        'contact_no',
        'personal',
        'location',
    ];

    public function getDoctorAttribute()
    {
        return $this->name . ', ' . $this->qualification;
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
