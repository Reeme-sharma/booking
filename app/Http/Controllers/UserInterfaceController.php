<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInterfaceController extends Controller
{
    public function show()
    {
        return view("userinterface.show");
    }
}
