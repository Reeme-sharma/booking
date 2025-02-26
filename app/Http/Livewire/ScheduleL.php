<?php

namespace App\Http\Livewire;

use App\Models\Schedule as Sc;
use Livewire\Component;

class ScheduleL extends Component
{
    public $firm;
    public $allschedule;
    public $isModalOpen = false; 
    public function mount($firm = null)
   {
     $this->firm = $firm;
   }

    public function render()
    {
        $this->allschedule = Sc::where('firm_id',$this->firm->id)->get();
        return view('livewire.schedule-l');
    }

    public function create()
    {
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

}
