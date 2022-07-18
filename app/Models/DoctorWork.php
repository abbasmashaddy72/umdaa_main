<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'where',
        'from',
        'to',
        'designation'
    ];
}
