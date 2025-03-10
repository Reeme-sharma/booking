<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodaySchedule extends Model
{
    protected $fillable = ['schedule_id','firm_id','user_id','week','todaydate','shift'];
}
