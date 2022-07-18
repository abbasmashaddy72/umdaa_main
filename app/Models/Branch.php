<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_no',
        'landmark',
        'locality_id',
        'pin_code',
        'registration_fee',
        'available_facilities',
        'manager_name',
        'manager_contact_no',
        'manager_email'
    ];

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }
}
