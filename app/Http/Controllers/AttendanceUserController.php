<?php

namespace App\Http\Controllers;

use App\Models\AttendanceUser;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttendanceUserController extends Controller
{
    // Tipos de asistencia como propiedad del controlador para reutilización
    protected $attendanceTypes = [
        'check_in' => 'Entrada',
        'check_out' => 'Salida',
    ];

    public function index(Request $request)
    {
        $login = Login::find(Session::get('login_id'));
        $authUser = $login?->loginable;

        if (!$authUser || !$authUser->gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        $gym = $authUser->gym;

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
            $query->where('attendable_id', $request->user_id);
        }

        $attendances = $query->paginate(10)->withQueryString();
        $users = User::where('gym_id', $gym->id)->get();

        return view('admin.attendance_users.index', [
            'attendances' => $attendances,
            'authUser' => $authUser,
            'users' => $users,
            'types' => $this->attendanceTypes // Pasamos los tipos a la vista
        ]);
    }

    public function create()
    {
        $login = Login::find(Session::get('login_id'));
        $authUser = $login?->loginable;
        
        if (!$authUser || !$authUser->gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        $users = User::where('gym_id', $authUser->gym->id)->get();

        return view('admin.attendance_users.create', [
            'authUser' => $authUser,
            'users' => $users,
            'types' => $this->attendanceTypes // Pasamos los tipos a la vista
        ]);
    }

    public function store(Request $request)
    {
        $login = Login::find(Session::get('login_id'));
        $authUser = $login?->loginable;
        
        if (!$authUser || !$authUser->gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        $request->validate([
            'attendable_id' => [
                'required',
                function ($attribute, $value, $fail) use ($authUser) {
                    $user = User::where('id', $value)
                              ->where('gym_id', $authUser->gym->id)
                              ->first();
                    if (!$user) {
                        $fail('Este usuario no pertenece a tu gimnasio.');
                    }
                }
            ],
            'check_in' => 'required|date',
            'check_out' => 'nullable|date|after_or_equal:check_in',
            'date' => 'required|date',
            'type' => 'required|in:' . implode(',', array_keys($this->attendanceTypes))
        ]);

        AttendanceUser::create([
            'attendable_type' => User::class,
            'attendable_id' => $request->attendable_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'date' => $request->date,
            'type' => $request->type
        ]);

        return redirect()->route('admin.attendance_users.index')
               ->with('success', 'Asistencia registrada exitosamente.');
    }

    public function edit(AttendanceUser $attendance)
    {
        $login = Login::find(Session::get('login_id'));
        $authUser = $login?->loginable;
        
        if (!$authUser || !$authUser->gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        // Verificar que la asistencia pertenezca al gimnasio
        if ($attendance->user->gym_id !== $authUser->gym->id) {
            abort(403, 'No autorizado');
        }

        $users = User::where('gym_id', $authUser->gym->id)->get();

        return view('admin.attendance_users.edit', [
            'attendance' => $attendance,
            'users' => $users,
            'types' => $this->attendanceTypes, // Pasamos los tipos a la vista
            'authUser' => $authUser
        ]);
    }

    public function update(Request $request, AttendanceUser $attendance)
    {
        $login = Login::find(Session::get('login_id'));
        $authUser = $login?->loginable;
        
        if (!$authUser || !$authUser->gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        // Verificar que la asistencia pertenezca al gimnasio
        if ($attendance->user->gym_id !== $authUser->gym->id) {
            abort(403, 'No autorizado');
        }

        $request->validate([
            'attendable_id' => [
                'required',
                function ($attribute, $value, $fail) use ($authUser) {
                    $user = User::where('id', $value)
                              ->where('gym_id', $authUser->gym->id)
                              ->first();
                    if (!$user) {
                        $fail('Este usuario no pertenece a tu gimnasio.');
                    }
                }
            ],
            'check_in' => 'required|date',
            'check_out' => 'nullable|date|after_or_equal:check_in',
            'date' => 'required|date',
            'type' => 'required|in:' . implode(',', array_keys($this->attendanceTypes))
        ]);

        $attendance->update([
            'attendable_id' => $request->attendable_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'date' => $request->date,
            'type' => $request->type
        ]);

        return redirect()->route('admin.attendance_users.index')
               ->with('success', 'Asistencia actualizada correctamente.');
    }

    public function destroy(AttendanceUser $attendance)
    {
        $login = Login::find(Session::get('login_id'));
        $authUser = $login?->loginable;
        
        if (!$authUser || !$authUser->gym) {
            return redirect('/login')->withErrors(['access' => 'Sesión inválida']);
        }

        // Verificar que la asistencia pertenezca al gimnasio
        if ($attendance->user->gym_id !== $authUser->gym->id) {
            abort(403, 'No autorizado');
        }

        $attendance->delete();

        return redirect()->route('admin.attendance_users.index')
               ->with('success', 'Asistencia eliminada correctamente.');
    }
}