<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule as Sc;
use App\Models\TodaySchedule as TS;

class TodaySchedule extends Component
{
    public $firm, $firm_id, $todayschedule;
    public function mount($firm = null)
    {
        $this->firm = $firm;
        $this->firm_id = $firm->id ?? null;
    }

    public function render()
    {
        $day = date('l');
        // dd($day);
        $this->todayschedule = Sc::where('firm_id', $this->firm->id)->where('week', $day)->get();
        // dd($this->todayschedule);
        return view('livewire.today-schedule');
    }

    public function store($sid)
    {
        $scdata = Sc::find($sid);
        $info=[
            'schedule_id' => $sid,
            'firm_id' => $this->firm->id,
            'user_id' => Auth::user()->id,
            'todaydate' => date('Y-m-d'),
            'week' => $scdata->week,
            'shift' => $scdata->shift
        ];
      TS::create($info); 
    }
    
    public function delete($sid)
    {
        $deleted = TS::find($sid)->delete();
   }
  }