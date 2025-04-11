<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class ReceptionistController extends Controller
{
    public function dashboard()
    {
        $receptionist = Session::get('user');
        return view('receptionist.dashboard', compact('receptionist'));
    }
}
