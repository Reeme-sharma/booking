<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodaySchedule extends Model
{
    protected $fillable = ['schedule_id','firm_id','user_id','week','todaydate','shift'];
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function userslot()
    {
        return $this->hasMany(UserSlot::class,'todayschedule_id');
    }
}
