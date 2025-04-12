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
                                    <th class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">Estado</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3 hidden lg:table-cell">Gimnasio</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3">Acciones</th>
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
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">
                                            {{ $userRow->state }}</td>
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 hidden lg:table-cell">
                                            {{ $userRow->gym->name }}</td>
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
                                    </tr>
                                @endforeach

                                @if ($users->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center px-4 py-6 text-gray-400">
                                            No hay usuarios registrados.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
