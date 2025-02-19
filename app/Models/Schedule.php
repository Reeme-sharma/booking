<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'user_id',
        'firm_id',
        'week',
        'shift',
        'start_from',
        'end_from',
        'max_appointment'
    ];
}
