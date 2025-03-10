<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule as Sc;
use App\Models\TodaySchedule as TS;

class TodaySchedule extends Component
{
    public $firm, $firm_id, $todayschedule;
   // protected $listeners = ['store', 'delete']; // Remove listeners
    public function mount($firm = null)
    {
        $this->firm = $firm;
        $this->firm_id = $firm->id ?? null;
    }

    public function render()
    {
        $day = date('l');
        // dd($day);
        // dd($this->firm->id);
        $this->todayschedule = Sc::where('firm_id', $this->firm->id)->where('week', $day)->get()->map(function ($schedule)
         {
           $schedule->is_today_schedule = TS::where('schedule_id', $schedule->id)->where('firm_id', $this->firm->id)
           ->where('user_id', Auth::user()->id)->exists();
           return $schedule;
        });
        return view('livewire.today-schedule');
    }

    public function store($sid)
    {
        $scdata = Sc::find($sid);
         if (!$scdata) {
            dd("Schedule Not Found!");
            return;
        }
     TS::create([
            'schedule_id' => $sid,
            'firm_id' => $this->firm->id,
            'user_id' => Auth::user()->id,
            'week' => $scdata->week,
            'shift' => $scdata->shift,
            'todaydate' => date('Y-m-d')
        ]);
     dd("Schedule Added to Today Schedule!"); 
    }
    
    public function delete($sid)
    {
        $deleted = TS::where('schedule_id', $sid)->where('firm_id', $this->firm->id)->where('user_id', Auth::user()->id)->delete();
       if ($deleted) {
            dd("Schedule Removed from Today Schedule!"); 
        } else {
            dd("No Schedule Found to Delete!");
        }
    }
  }