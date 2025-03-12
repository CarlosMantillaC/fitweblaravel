<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!session('admin_logged')) {
            return redirect()->route('login');
        }
        return view('admin.dashboard'); // Asegúrate de que la vista está en resources/views/admin/dashboard.blade.php
    }
}
