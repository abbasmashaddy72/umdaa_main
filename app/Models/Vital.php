<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'pulse_rate',
        'bp',
        'resp_rate',
        'temp',
        'spo2',
        'height',
        'weight',
        'bmi',
        'bsa',
        'waist',
        'hip',
        'wh_ratio',
    ];

    public function appointment()
    {
        return $this->belongsToMany(Appointment::class);
    }
}
