<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkSMS extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_id',
        'total_sent',
        'processed',
        'invalid',
        'duplicate',
        'dnd',
        'valid',
        'branch_id',
        'user_id'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
