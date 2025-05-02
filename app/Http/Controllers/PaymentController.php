<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Login;
use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
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

        $query = Payment::whereHas('user', function ($q) use ($gym, $request) {
            $q->where('gym_id', $gym->id);

            if ($request->filled('user_name')) {
                $q->where('name', 'like', '%' . $request->user_name . '%');
            }
        })->with(['user', 'membership']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('amount', 'like', "%$search%")
                    ->orWhere('payment_method', 'like', "%$search%")
                    ->orWhere('date', 'like', "%$search%")
                    ->orWhereHas('user', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%$search%");
                    });
            });
        }

        if ($request->filled('payment_method') && $request->payment_method !== 'all') {
            $query->where('payment_method', $request->payment_method);
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('membership_id')) {
            $query->where('membership_id', $request->membership_id);
        }

        $payments = $query->paginate($perPage)->withQueryString();

        $memberships = Membership::whereHas('user', function ($q) use ($gym) {
            $q->where('gym_id', $gym->id);
        })
        ->whereHas('payments') // ← Solo membresías con pagos
        ->with('user')
        ->get();
        
        $paymentMethods = Payment::whereHas('user', function ($q) use ($gym) {
            $q->where('gym_id', $gym->id);
        })
        ->select('payment_method')
        ->distinct()
        ->pluck('payment_method');

        return view('admin.payments.index', compact('payments', 'user', 'memberships', 'paymentMethods'));
    }        

    public function create()
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;
        $gym = $user->gym;

        $users = User::where('gym_id', $gym->id)->get();
        $memberships = Membership::whereIn('user_id', $users->pluck('id'))->get();

        return view('admin.payments.create', compact('user', 'gym', 'users', 'memberships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'membership_id' => 'required|exists:memberships,id',
        ]);

        Payment::create($request->all());

        return redirect()->route('admin.payments')->with('success', 'Pago registrado correctamente.');
    }

    public function edit(Payment $payment)
    {
        $login = Login::find(Session::get('login_id'));
        $user = $login->loginable;
        $gym = $user->gym;

        $users = User::where('gym_id', $gym->id)->get();
        $memberships = Membership::whereIn('user_id', $users->pluck('id'))->get();

        return view('admin.payments.edit', compact('payment', 'users', 'memberships', 'gym'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'membership_id' => 'required|exists:memberships,id',
        ]);

        $payment->update($request->all());

        return redirect()->route('admin.payments')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('admin.payments')->with('success', 'Pago eliminado correctamente.');
    }
}
