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
        'valid'
    ];
}
