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

        return view('admin.users.users', compact('users', 'user'));
    }

    public function create()
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;
        $gym = $user->gym;

        return view('admin.users.create-user', compact('user', 'gym'));
    }

    public function store(Request $request)
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;

        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'state' => 'required|string',
            'gym_id' => 'required|exists:gyms,id',
        ]);

        \App\Models\User::create($request->all());

        return redirect()->route(class_basename($user) === 'Admin' ? 'admin.users' : 'receptionist.users')
            ->with('success', 'Usuario registrado correctamente.');
    }

    public function edit(User $user)
    {
        $gyms = Gym::all();
        return view('admin.users.edit', [
            'editUser' => $user,
            'gyms' => $gyms
        ]);
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

        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.');
    }
}
