<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Login;
use Carbon\Carbon;

class UserController extends Controller
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

        $query = $gym->users();

        // Filtros
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone_number', 'like', "%$search%")
                    ->orWhere('state', 'like', "%$search%")
                    ->orWhere('gender', 'like', "%$search%");
            });
        }

        // Filtro por estado específico
        if ($request->has('state') && $request->state != 'all') {
            $query->where('state', $request->state);
        }

        // Filtro por género
        if ($request->has('gender') && $request->gender != 'all') {
            $query->where('gender', $request->gender);
        }

        $perPage = $request->input('per_page', 10); // 10 por defecto
        $users = $query->paginate($perPage);
        return view('admin.users.index', compact('users', 'user'));
    }

    public function create()
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;
        $gym = $user->gym;

        return view('admin.users.create', compact('user', 'gym'));
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
            'email' => 'required|string',
            'state' => 'required|string',
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
            'email' => 'required|string',
            'state' => 'required|string',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.');
    }

    public function dashboard()
    {
        $activos = User::where('state', 'activo')->count();
        $inactivos = User::where('state', 'inactivo')->count();

        // Obtener el rango de fechas del mes pasado
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $usuariosMesPasado = User::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();

        return view('admin.dashboard', compact('activos', 'inactivos', 'usuariosMesPasado'));
    }

    public function userStats(Request $request)
    {
        $period = $request->query('period', 'all');

        $query = User::query();

        switch ($period) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'this_month':
                $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'last_month':
                $query->whereBetween('created_at', [
                    Carbon::now()->subMonth()->startOfMonth(),
                    Carbon::now()->subMonth()->endOfMonth()
                ]);
                break;
            case 'two_months_ago':
                $query->whereBetween('created_at', [
                    Carbon::now()->subMonths(2)->startOfMonth(),
                    Carbon::now()->subMonths(2)->endOfMonth()
                ]);
                break;
                // default: no filtrar
        }

        $activos = (clone $query)->where('state', 'activo')->count();
        $inactivos = (clone $query)->where('state', 'inactivo')->count();

        return response()->json([
            'activos' => $activos,
            'inactivos' => $inactivos
        ]);
    }

    public function usersByMonth()
    {
        $usersByMonth = User::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as mes, COUNT(*) as total")
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        return response()->json($usersByMonth);
    }
}
