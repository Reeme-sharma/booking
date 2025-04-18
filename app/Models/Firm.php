<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    protected $fillable = ['firm_name','category','about_us','firm_mobile','pincode','since','street','landmark','address','city','state','country','pan_no','map','register_no','gst_no','profilepic','user_id'];
    public function todayschedule()
    {
        return $this->hasMany(TodaySchedule::class);
    }
}

