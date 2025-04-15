<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Schedule as Sc;
use Illuminate\Support\Facades\Auth;

class ScheduleL extends Component
{
    public $firm,$firm_id,$user_id,$week=[],$shift,$start_from,$end_from,$max_appointment;
    public $allschedule;
    public $isModalOpen = false; 
    public function mount($firm = null)
   {
     $this->firm = $firm;
     $this->firm_id = $firm->id??null;

   }

    public function render()
    {
        $this->allschedule = Sc::where('firm_id',$this->firm->id)->get();
        return view('livewire.schedule-l');
    } 
    
    public function store()
    {
        foreach($this->week as $week)
        {
        $detail=[
            'user_id'=>Auth::user()->id,
            'firm_id'=>$this->firm_id,
            'week'=>$week,
            'shift'=>$this->shift,
            'start_from'=>$this->start_from,
            'end_from'=>$this->end_from,
            'max_appointment'=>$this->max_appointment
        ];
        $findfirm = Sc::where('firm_id',$this->firm_id)->where('week',$week)->where('shift',$this->shift)->get();
       if(count($findfirm) > 0)
       {
           Sc::updateOrCreate(['id'=> $findfirm[0]->id],$detail);
       }
       else
       {
            Sc::create($detail);
       }
         }
        $this->resetFields();
        $this->closeModal();
    }

     public function create()
    {
        $this->openModal();
    }

    public function delete($id)
    {
        Sc::find($id)->delete();
        $this->render();
    }
    
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetFields()
    {
        $this->week = [];
        $this->shift = null;
        $this->start_from = null;
        $this->end_from = null;
        $this->max_appointment = null;
    }
    

}
