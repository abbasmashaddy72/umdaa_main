<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'locality_id',
        'gender',
        'blood_group',
        'dob',
        'contact_no',
        'description'
    ];

    public function getPatientAttribute()
    {
        return $this->name . ', ' . $this->contact_no;
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    public function relation()
    {
        return $this->belongsToMany(PatientRelation::class);
    }
}
