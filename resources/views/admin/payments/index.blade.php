@extends('admin.layouts.app')

@section('title')
    @php
        $role = class_basename($user);
    @endphp
    {{ $role === 'Admin' ? 'Admin Dashboard' : ($role === 'Receptionist' ? 'Receptionista Dashboard' : 'Dashboard') }}
@endsection

@section('content')
    <main class="flex-1 p-4 lg:p-8 mt-1 lg:mt-0">

        <!-- Título -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-[#f36100] transition-all duration-300">
                Pagos - <span class="text-white">{{ $role === 'Admin' ? 'Admin' : 'Recepcionista' }}</span>
            </h1>
            <a href="{{ route($role === 'Admin' ? 'admin.payments.create' : 'receptionist.payments.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto text-center">
                + Registrar Pago
            </a>
        </div>

        <!-- Filtros -->
        <div class="bg-[#151515] p-4 rounded-lg shadow mb-6">
            <form action="{{ url()->current() }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Buscar -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-300 mb-1">Buscar</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                    focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                    transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Nombre del usuario, método...">
                </div>

                <!-- Membresía -->
                <div>
                    <label for="membership_id" class="block text-sm font-medium text-gray-300 mb-1">Membresía</label>
                    <select name="membership_id" id="membership_id"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70">
                        <option value="">Todas</option>
                        @foreach ($memberships as $membership)
                            <option value="{{ $membership->id }}"
                                {{ request('membership_id') == $membership->id ? 'selected' : '' }}>
                                {{ $membership->type }} - {{ $membership->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Método -->
                <div>
                    <label for="method" class="block text-sm font-medium text-gray-300 mb-1">Método</label>
                    <select name="payment_method"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70">
                        <option value="">Todos</option>
                        @foreach ($paymentMethods as $method)
                            <option value="{{ $method }}" {{ request('payment_method') === $method ? 'selected' : '' }}>
                                {{ ucfirst($method) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Botones -->
                <div class="flex items-end gap-2">
                    <button type="submit"
                        class="w-full px-6 py-2 bg-[#f36100] text-white rounded-lg 
                    hover:bg-[#ff6a00] hover:text-[#151515] active:scale-95 transition-all duration-300 cursor-pointer md:w-auto">
                        Filtrar
                    </button>
                    <a href="{{ url()->current() }}"
                        class="block w-full px-6 py-2 border border-gray-500 text-gray-300 text-center rounded-lg 
                    hover:border-[#f36100] hover:text-[#f36100] active:scale-95 transition-all duration-300 md:w-auto">
                        Limpiar
                    </a>
                </div>
            </form>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full bg-[#151515] rounded-lg shadow-lg">
                        <thead>
                            <tr class="text-left border-b border-gray-700">
                                <th class="px-4 py-3 text-sm text-gray-300">ID</th>
                                <th class="px-4 py-3 text-sm text-gray-300">Usuario</th>
                                <th class="px-4 py-3 text-sm text-gray-300">ID_Membresia</th>
                                <th class="px-4 py-3 text-sm text-gray-300">Monto</th>
                                <th class="px-4 py-3 text-sm text-gray-300">Método</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Fecha</th>
                                @if ($role === 'Admin')
                                    <th class="px-4 py-3 text-sm text-gray-300">Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr
                                    class="border-b border-gray-700 hover:bg-[#252525] hover:text-white transition duration-300">
                                    <td class="px-4 py-3 text-sm text-white">{{ $payment->id }}</td>
                                    <td class="px-4 py-3 text-sm text-white">{{ $payment->user->name }}</td>
                                    <td class="px-4 py-3 text-sm text-white">{{ $payment->membership_id }}</td>
                                    <td class="px-4 py-3 text-sm text-white">
                                        ${{ number_format($payment->amount, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-white">{{ $payment->payment_method }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        {{ $payment->created_at->format('d/m/Y') }}</td>
                                    @if ($role === 'Admin')
                                        <td class="px-4 py-3 flex gap-2">
                                            <a href="{{ route('payments.edit', $payment->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm transition duration-300">
                                                Editar
                                            </a>
                                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este pago?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition duration-300">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $role === 'Admin' ? 7 : 6 }}"
                                        class="text-center px-4 py-6 text-gray-400">
                                        No hay pagos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4 px-4 py-3 flex items-center justify-between border-t border-gray-700 sm:px-6">
                        {{ $payments->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
