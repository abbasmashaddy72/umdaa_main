<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'where',
        'from',
        'to',
        'designation'
    ];
}
