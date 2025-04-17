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
                Usuarios - {{ class_basename($user) === 'Admin' ? 'Admin' : 'Recepcionista' }}
            </h1>
            <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.users.create' : 'receptionist.users.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto text-center">
                + Agregar Usuario
            </a>
        </div>

        <!-- Formulario de Filtrado -->
        <div class="bg-gray-800 p-4 rounded-lg shadow mb-6">
            <form action="{{ url()->current() }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Búsqueda general -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-300 mb-1">Buscar</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nombre, email, teléfono...">
                </div>

                <!-- Filtro por Estado -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-300 mb-1">Estado</label>
                    <select name="state" id="state"
                        class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="all" {{ request('state') == 'all' ? 'selected' : '' }}>Todos</option>
                        <option value="Activo" {{ request('state') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ request('state') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <!-- Filtro por Género -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-300 mb-1">Género</label>
                    <select name="gender" id="gender"
                        class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>Todos</option>
                        <option value="M" {{ request('gender') == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ request('gender') == 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>

                <!-- Botones -->
                <div class="flex items-end gap-2">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto">
                        Filtrar
                    </button>
                    <a href="{{ url()->current() }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto text-center">
                        Limpiar
                    </a>
                </div>
                <!-- Botones y Selector de Items por Página -->
                <div class="flex items-center gap-2">
                    <label for="per_page" class="text-sm text-gray-300">Mostrar:</label>
                    <select name="per_page" id="per_page" onchange="this.form.submit()"
                        class="bg-gray-700 border border-gray-600 rounded-md py-1 px-2 text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="5" {{ request('per_page', 10) == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-400">items</span>
                </div>

            </form>
        </div>



        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full bg-gray-800 rounded-lg shadow">
                        <thead>
                            <tr class="text-left border-b border-gray-700">
                                <th class="px-2 py-2 lg:px-4 lg:py-3">ID</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3">Nombre</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">Género</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">Fecha Nac.</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">Teléfono</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">Email</th>
                                <th class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">Estado</th>
                                @if (class_basename($user) === 'Admin')
                                    <th class="px-2 py-2 lg:px-4 lg:py-3">Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $userRow)
                                <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                                    <td class="px-2 py-2 lg:px-4 lg:py-3">{{ $userRow->id }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3">{{ $userRow->name }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">
                                        {{ $userRow->gender }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">
                                        {{ $userRow->birth_date }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">
                                        {{ $userRow->phone_number }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">
                                        {{ $userRow->email }}</td>
                                    <td class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">
                                        {{ $userRow->state }}</td>
                                    @if (class_basename($user) === 'Admin')
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 flex flex-wrap gap-1">
                                            <a href="{{ route('users.edit', $userRow->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-sm lg:px-3 lg:py-1 lg:text-base rounded">
                                                Editar
                                            </a>
                                            <form action="{{ route('users.destroy', $userRow->id) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-sm lg:px-3 lg:py-1 lg:text-base rounded">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="{{ class_basename($user) === 'Admin' ? 8 : 7 }}"
                                        class="text-center px-4 py-6 text-gray-400">
                                        No hay usuarios registrados.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                        <!-- Paginación -->
                        <div class="mt-4 px-4 py-3 flex items-center justify-between border-t border-gray-700 sm:px-6">
                            {{ $users->appends(request()->except('page'))->links() }}
                        </div>
                    </table>


                </div>
            </div>
        </div>
    </main>
    </div>
@endsection
