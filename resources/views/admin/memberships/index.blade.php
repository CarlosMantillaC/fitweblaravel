@extends('admin.layouts.app')

@section('title')
    @if (class_basename($user) === 'Admin')
        Admin Dashboard
    @elseif (class_basename($user) === 'Receptionist')
        Receptionista Dashboard
    @else
        Dashboard
    @endif
@endsection

@section('content')
    <!-- Contenido principal -->
    <main class="flex-1 p-4 lg:p-8 mt-1 lg:mt-0">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <h1 class="text-2xl lg:text-3xl font-bold">
                Membresías - {{ class_basename($user) === 'Admin' ? 'Admin' : 'Recepcionista' }}
            </h1>
            <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.memberships.create' : 'receptionist.memberships.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto text-center">
                + Agregar Membresía
            </a>
        </div>

        <!-- Buscador por Nombre de Usuario -->
        <form method="GET" action="{{ url()->current() }}" class="mb-6 flex flex-col sm:flex-row gap-2 sm:items-center">
            <input
                type="text"
                name="user_name"
                placeholder="Buscar por nombre de usuario"
                value="{{ request('user_name') }}"
                class="w-full sm:w-auto px-4 py-2 rounded-lg border border-gray-600 bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-green-600"
            >
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow w-full sm:w-auto text-center">
                Buscar
            </button>
        </form>

        <form method="GET" action="{{ url()->current() }}" class="mb-4 flex items-center gap-2 text-sm text-gray-200">
            <label for="per_page">Mostrar</label>
            <select name="per_page" id="per_page" onchange="this.form.submit()"
                class="bg-gray-800 border border-gray-600 text-white px-2 py-1 rounded">
                @foreach ([5, 10, 25, 50, 100] as $size)
                    <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>{{ $size }}</option>
                @endforeach
            </select>
            <span>registros</span>

            {{-- Mantener filtros de búsqueda al cambiar per_page --}}
            @if(request('user_name'))
                <input type="hidden" name="user_name" value="{{ request('user_name') }}">
            @endif
        </form>



        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full bg-gray-800 rounded-lg shadow">
                        <thead>
                            <tr class="text-left border-b border-gray-700">
                                <th class="px-2 py-2 lg:px-4 lg:py-3">ID</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3">Tipo</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">Monto</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">Descuento</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">Fecha de Inicio</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">Fecha de Fin</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden lg:table-cell">Usuario</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberships as $membership)
                                <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                                    <td class="px-2 py-2 lg:px-4 lg:py-3">{{ $membership->id }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3">{{ $membership->type }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">
                                        ${{ number_format($membership->amount, 2) }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">
                                        ${{ number_format($membership->discount, 2) }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">
                                        {{ $membership->start_date }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">
                                        {{ $membership->finish_date }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden lg:table-cell">
                                        {{ $membership->user->name }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 flex flex-wrap gap-1">
                                        @if (class_basename($user) === 'Admin')
                                            <a href="{{ route('memberships.edit', $membership->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-sm lg:px-3 lg:py-1 lg:text-base rounded">
                                                Editar
                                            </a>
                                            <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar esta membresía?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-sm lg:px-3 lg:py-1 lg:text-base rounded">
                                                    Eliminar
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 text-sm italic">Sin permisos</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @if ($memberships->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center px-4 py-6 text-gray-400">
                                        No hay membresías registradas.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if ($memberships->total() > 0)
                    <div class="flex flex-col md:flex-row justify-between items-center mt-4 text-sm text-gray-300">
                        {{-- Texto de cantidad --}}
                        <div class="mb-2 md:mb-0">
                            Mostrando registros del {{ $memberships->firstItem() }} al {{ $memberships->lastItem() }}
                            de un total de {{ $memberships->total() }} registros
                        </div>

                        {{-- Paginación --}}
                        <div class="flex items-center space-x-2">
                            {{-- Botón anterior --}}
                            @if ($memberships->onFirstPage())
                                <span class="px-3 py-1 bg-gray-700 text-gray-400 rounded cursor-not-allowed">Anterior</span>
                            @else
                                <a href="{{ $memberships->previousPageUrl() }}" class="px-3 py-1 bg-gray-800 hover:bg-gray-700 text-white rounded">
                                    Anterior
                                </a>
                            @endif

                            {{-- Número de páginas --}}
                            @for ($i = 1; $i <= $memberships->lastPage(); $i++)
                                @if ($i == $memberships->currentPage())
                                    <span class="px-3 py-1 bg-blue-600 text-white rounded">{{ $i }}</span>
                                @else
                                    <a href="{{ $memberships->url($i) }}" class="px-3 py-1 bg-gray-800 hover:bg-gray-700 text-white rounded">
                                        {{ $i }}
                                    </a>
                                @endif
                            @endfor

                            {{-- Botón siguiente --}}
                            @if ($memberships->hasMorePages())
                                <a href="{{ $memberships->nextPageUrl() }}" class="px-3 py-1 bg-gray-800 hover:bg-gray-700 text-white rounded">
                                    Siguiente
                                </a>
                            @else
                                <span class="px-3 py-1 bg-gray-700 text-gray-400 rounded cursor-not-allowed">Siguiente</span>
                            @endif
                        </div>
                    </div>
                @endif

                </div>
            </div>
        </div>
    </main>
@endsection
