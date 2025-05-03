<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use App\Models\Payment;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $gym = $this->getGym();

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
        })->whereHas('payments')->with('user')->get();

        $paymentMethods = Payment::whereHas('user', function ($q) use ($gym) {
            $q->where('gym_id', $gym->id);
        })->select('payment_method')->distinct()->pluck('payment_method');

        $users = User::where('gym_id', $gym->id)->get();

        return view('admin.payments.index', compact('payments', 'users', 'memberships', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'membership_id' => 'required|exists:memberships,id',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Pago registrado correctamente.');
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'membership_id' => 'required|exists:memberships,id',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('admin.payments')->with('success', 'Pago eliminado correctamente.');
    }

        // Método privado para obtener el gimnasio desde la sesión
        private function getGym()
        {
            $login = Login::find(Session::get('login_id'));
    
            if (!$login || !$login->loginable || !$login->loginable->gym) {
                abort(403, 'Acceso no autorizado.');
            }
    
            return $login->loginable->gym;
        }
}
