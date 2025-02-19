<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "i am schedule index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if($firm_id=request('firm_id'))
        {
            $firm=Firm::find($firm_id);
         return view('schedule_form',compact('firm'));
        }
        return abort('419');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach($request->week as $week)
        {
        $detail=[
            'user_id'=>Auth::user()->id,
            'firm_id'=>$request->firm_id,
            'week'=>$week,
            'shift'=>$request->shift,
            'start_from'=>$request->start_from,
            'end_from'=>$request->end_from,
            'max_appointment'=>$request->max_appointment
        ];
        Schedule::create($detail);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
