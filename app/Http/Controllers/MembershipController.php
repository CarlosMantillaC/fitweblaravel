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
    public function index(Request $request)
    {
        $loginId = Session::get('login_id');
        $login = Login::find($loginId);

        if (!$login || !$login->loginable) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        $user = $login->loginable;
        $gym = $user->gym;

        $perPage = $request->input('per_page', 10); // Por defecto 10

        $query = Membership::whereHas('user', function ($q) use ($gym, $request) {
            $q->where('gym_id', $gym->id);

            if ($request->filled('user_name')) {
                $q->where('name', 'LIKE', '%' . $request->user_name . '%');
            }
        })->with('user');

        // Obtenemos los tipos de membresía únicos
        $types = Membership::whereHas('user', function ($q) use ($gym) {
            $q->where('gym_id', $gym->id);
        })->distinct('type')->pluck('type');

        // 🔍 Filtro general (tipo, fechas, monto, descuento, nombre de usuario)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('type', 'like', "%$search%")
                    ->orWhere('start_date', 'like', "%$search%")
                    ->orWhere('finish_date', 'like', "%$search%")
                    ->orWhere('amount', 'like', "%$search%")
                    ->orWhere('discount', 'like', "%$search%")
                    ->orWhereHas('user', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%$search%");
                    });
            });
        }

        // Filtro por tipo de membresía
        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        // Filtro por fechas
        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->start_date);
        }

        if ($request->filled('finish_date')) {

            $query->whereDate('finish_date', '=', $request->finish_date);
        }

        $memberships = $query->paginate($perPage)->withQueryString();

        return view('admin.memberships.index', compact('memberships', 'user', 'types'));
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
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;

        $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'required|exists:users,id',
        ]);

        Membership::create($request->all());

        return redirect()->route(class_basename($user) === 'Admin' ? 'admin.memberships' : 'receptionist.memberships')
            ->with('success', 'Usuario registrado correctamente.');
    }

    public function edit(Membership $membership)
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;
        $gym = $user->gym;

        // Solo permitir editar usuarios del gimnasio
        $users = User::where('gym_id', $gym->id)->get();

        $types = \App\Models\Membership::select('type')->distinct()->pluck('type');

        return view('admin.memberships.edit', compact('membership', 'users', 'gym', 'types'));
    }

    public function update(Request $request, Membership $membership)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after_or_equal:start_date',
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
