<?php

namespace App\Http\Controllers;

use App\Models\UserSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = UserSlot::where('user_id',Auth::user()->id)->orderBy('date','desc')->get();
       return view("userslot.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $info = UserSlot::where('todayschedule_id', $request->todayschedule_id)->latest()->first();
        $next = ($info['slotno'] ?? 0) + 1;
        $info = [
            'todayschedule_id' => $request->todayschedule_id,
            'user_id' => $user->id,
            'username' => $user->name,
            'mobileno' => $user->mobile,
            'slotno' => $next,
            'time' => $request->time,
            'date' => date('Y-m-d')
        ];
        UserSlot::create($info);
        return redirect("/userslot");
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSlot $userSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSlot $userSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserSlot $userSlot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userSlot = UserSlot::find($id);
        $userSlot->delete();
        return redirect("/userslot");
    }
}
