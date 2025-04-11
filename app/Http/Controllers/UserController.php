<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Login;

class UserController extends Controller
{
    public function index()
    {
        $loginId = Session::get('login_id');
        $login = Login::find($loginId);
    
        if (!$login || !$login->loginable) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        $user = $login->loginable; 
        $gym = $user->gym;        
        
        $users = $gym->users;
    
        return view('admin.tables.users', compact('users', 'user'));
    }

    public function create()
    {
        $gyms = Gym::all();
        return view('users.create', compact('gyms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'birth_date' => 'required|date',
            'phone_number' => 'required|string',
            'state' => 'required|string',
            'gym_id' => 'required|exists:gyms,id',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $user)
    {
        $gyms = Gym::all();
        return view('users.edit', compact('user', 'gyms'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'birth_date' => 'required|date',
            'phone_number' => 'required|string',
            'state' => 'required|string',
            'gym_id' => 'required|exists:gyms,id',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
