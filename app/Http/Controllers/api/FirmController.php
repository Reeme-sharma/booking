<?php

namespace App\Http\Controllers\api;

use App\Models\Firm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(['data'=>Firm::all()],200);
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
        $info=[
            'firm_name'=>$request->firm_name,
            'firm_mobile'=>$request->firm_mobile,
            'pincode'=>$request->pincode,
            'since'=>$request->since,
            'street'=>$request->street,
            'landmark'=>$request->landmark,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'pan_no'=>$request->pan_no,
            // 'map'=>$request->map,
            'register_no'=>$request->register_no,
            'gst_no'=>$request->gst_no,
            // 'prpfilepic'=>$request->profilepic,
            'user_id'=>2
        ];
        Firm::create($info);
        return response(['data'=>'done'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response(['data'=>Firm::find($id)],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $info=[
            'firm_name'=>$request->firm_name,
            'firm_mobile'=>$request->firm_mobile,
            'pincode'=>$request->pincode,
            'since'=>$request->since,
            'street'=>$request->street,
            'landmark'=>$request->landmark,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'pan_no'=>$request->pan_no,
            // 'map'=>$request->map,
            'register_no'=>$request->register_no,
            'gst_no'=>$request->gst_no,
            // 'prpfilepic'=>$request->profilepic,
            'user_id'=>2
        ];
        Firm::updateOrCreate(['id'=>$id],$info);
        return response(['data'=>'done'],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Firm::find($id)->delete();
        return response(['data'=>'done'],200);
    }
}
