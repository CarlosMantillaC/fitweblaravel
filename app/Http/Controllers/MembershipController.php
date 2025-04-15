<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Login;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MembershipController extends Controller
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

        // Obtener membresías de los usuarios del gimnasio
        $memberships = Membership::whereHas('user', function ($query) use ($gym) {
            $query->where('gym_id', $gym->id);
        })->with('user')->get();

        return view('admin.memberships.index', compact('memberships', 'user'));
    }

    public function create()
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;
        $gym = $user->gym;

        // Solo mostrar usuarios del gimnasio
        $users = User::where('gym_id', $gym->id)->get();

        return view('admin.memberships.create', compact('user', 'gym', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after:start_date',
            'user_id' => 'required|exists:users,id',
        ]);

        Membership::create($request->all());

        return redirect()->route('admin.memberships')->with('success', 'Membresía registrada correctamente.');
    }

    public function edit(Membership $membership)
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;
        $gym = $user->gym;

        // Solo permitir editar usuarios del gimnasio
        $users = User::where('gym_id', $gym->id)->get();

        return view('admin.memberships.edit', compact('membership', 'users', 'gym'));
    }

    public function update(Request $request, Membership $membership)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after:start_date',
            'user_id' => 'required|exists:users,id',
        ]);

        $membership->update($request->all());

        return redirect()->route('admin.memberships')->with('success', 'Membresía actualizada correctamente.');
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();

        return redirect()->route('admin.memberships')->with('success', 'Membresía eliminada correctamente.');
    }
}
