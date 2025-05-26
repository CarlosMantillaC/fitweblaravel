<?php

namespace App\Http\Controllers;

use App\Models\AttendanceUser;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttendanceUserController extends Controller
{
    public function index(Request $request)
    {
        $login = Login::find(Session::get('login_id'));

        if (!$login || !$login->loginable) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        $user = $login->loginable;
        $gym = $user->gym;

        $perPage = $request->input('per_page', 10);

        $query = AttendanceUser::whereHas('user', function ($q) use ($gym, $request) {
            $q->where('gym_id', $gym->id);

            if ($request->filled('user_name')) {
                $q->where('name', 'like', '%' . $request->user_name . '%');
            }
        })->with('user');

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $attendances = $query->paginate($perPage)->withQueryString();

        $users = User::where('gym_id', $gym->id)->get();

        return view('admin.attendance-users.index', compact('attendances', 'user', 'users'));
    }

    public function create()
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login?->loginable;

        if (!$user || !$user->gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        $users = User::where('gym_id', $user->gym->id)->get();

        return view('admin.attendance-users.create', compact('user', 'users'));
    }

    public function store(Request $request)
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login?->loginable;
        $gym = $user->gym;

        if (!$user || !$gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        $request->validate([
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after_or_equal:check_in',
            'date' => 'required|date',
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) use ($gym) {
                    $user = User::where('id', $value)
                        ->where('gym_id', $gym->id)
                        ->first();

                    if (!$user) {
                        $fail('No existe un usuario con este ID en el gimnasio.');
                    }
                }
            ],
        ]);

        AttendanceUser::create([
            'user_id' => $request->user_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.attendance-users.index')
                         ->with('success', 'Asistencia registrada exitosamente.');
    }

    public function edit(AttendanceUser $attendance)
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login?->loginable;
        $gym = $user->gym;

        if (!$user || !$gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        if ($attendance->user->gym_id !== $gym->id) {
            abort(403, 'No autorizado');
        }

        $users = User::where('gym_id', $gym->id)->get();

        return view('admin.attendance-users.edit', compact('attendance', 'users', 'user'));
    }

    public function update(Request $request, AttendanceUser $attendance)
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login?->loginable;
        $gym = $user->gym;

        if (!$user || !$gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        if ($attendance->user->gym_id !== $gym->id) {
            abort(403, 'No autorizado');
        }

        $request->validate([
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) use ($gym) {
                    $user = User::where('id', $value)
                        ->where('gym_id', $gym->id)
                        ->first();

                    if (!$user) {
                        $fail('Este usuario no pertenece a tu gimnasio.');
                    }
                }
            ],
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after_or_equal:check_in',
            'date' => 'required|date',
        ]);

        $attendance->update([
            'user_id' => $request->user_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.attendance-users.index')
                         ->with('success', 'Asistencia actualizada correctamente.');
    }

    public function destroy(AttendanceUser $attendance)
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login?->loginable;
        $gym = $user->gym;

        if (!$user || !$gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        if ($attendance->user->gym_id !== $gym->id) {
            abort(403, 'No autorizado');
        }

        $attendance->delete();

        return redirect()->route('admin.attendance-users.index')
                         ->with('success', 'Asistencia eliminada correctamente.');
    }
}
