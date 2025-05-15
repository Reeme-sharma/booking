<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSlot extends Model
{
    protected $fillable = [
        'todayschedule_id',
        'user_id',
        'username',
        'mobileno',
        'slotno',
        'time',
        'date'
    ];
    public function todayschedule()
    {
        return $this->belongsTo(TodaySchedule::class,'todayschedule_id');
    }
}
