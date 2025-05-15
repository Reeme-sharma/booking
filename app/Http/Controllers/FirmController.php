<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Fetch all firms related to the logged-in user
    $info = Auth::user()->firm;
    // Pass the firms to the view
    return view('firm_index', compact('info'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("firm_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $info=[
            'firm_name'=>$request->firm_name, 
            'category'=>$request->category,
            'about_us'=>$request->about_us,
            'gst_no'=>$request->gst_no, 
            'register_no'=>$request->register_no, 
            // 'map'=>$request->map, 
            'pan_no'=>$request->pan_no, 
            'country'=>$request->country, 
            'state'=>$request->state, 
            'city'=>$request->city, 
            'address'=>$request->address, 
            'landmark'=>$request->landmark, 
            'street'=>$request->street, 
            'since'=>$request->since, 
            'pincode'=>$request->pincode, 
            'firm_mobile'=>$request->firm_mobile, 
            'user_id'=>Auth::user()->id
        ];
        Firm::create($info);
        $categories = Firm::distinct()->pluck('category');
        return view("firm_form", compact('categories'));
    }

    function mapupdate(string $id)
    {
        $frm = Firm::find($id);
        $frm->latitude = request('latitude');
        $frm->longitude = request('longitude');
        $frm->save();
        return redirect('/firm');
    }

    /**
     * Display the specified resource.
     */
    public function show(Firm $firm)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $firm = Firm::find($id);
        $categories = Firm::distinct()->pluck('category');
        return view('firm_form', ['data' => $firm, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Firm $firm)
    {
        $info=[
            'firm_name'=>$request->firm_name,
            'category'=>$request->category,
            'about_us'=>$request->about_us,
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
            // 'prfilepic'=>$request->profilepic,
            'user_id'=>Auth::user()->id
        ];
        $firm->update($info);
        $categories = Firm::distinct()->pluck('category');
        return view("firm_form", ['data' => $firm, 'categories' => $categories]);
        // return redirect()->route('firm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Firm $firm)
    {
        //
    }

    public function updateprofilepic()
    {
        $firmid = request('id');
        $fileobj = request('profilepic');
        $filename = time()."_".$fileobj->getClientOriginalName();
        $fileobj->move('./image',$filename);
        $firm = Firm::find($firmid);
        if($firm->profilepic)
        {
            unlink('./image/'.$firm->profilepic);
        }
        $firm->profilepic = $filename;
        $firm->save();
        return redirect('/firm');
    }
}
