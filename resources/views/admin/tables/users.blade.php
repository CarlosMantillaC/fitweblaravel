<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (class_basename($user) === 'Admin')
            Admin Dashboard
        @elseif (class_basename($user) === 'Receptionist')
            Receptionista Dashboard
        @else
            Dashboard
        @endif
    </title>
    @vite(['resources/css/tailwind.css'])
</head>

<body class="bg-gray-900 text-white">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-gray-100 shadow-lg">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-2xl font-bold">Mi Panel</h1>
            </div>
            <nav class="mt-6 space-y-2">
                <a href="dashboard" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Inicio</a>

                <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.users' : 'receptionist.users') }}"
                    class="block py-2.5 px-4 hover:bg-gray-700 rounded">Usuarios</a>

                <a href="#" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Configuración</a>

                <form method="POST" action="{{ route('logout') }}" class="mt-4 px-4">
                    @csrf
                    <button type="submit"
                        class="w-full text-left py-2.5 px-4 bg-orange-600 hover:bg-orange-700 rounded">
                        Cerrar sesión
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">
                    Usuarios - {{ class_basename($user) === 'Admin' ? 'Admin' : 'Recepcionista' }}
                </h1>
                <a href="{{ route('users.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
                    + Agregar Usuario
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-800 rounded-lg shadow">
                    <thead>
                        <tr class="text-left border-b border-gray-700">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Género</th>
                            <th class="px-4 py-3">Fecha de nacimiento</th>
                            <th class="px-4 py-3">Teléfono</th>
                            <th class="px-4 py-3">Estado</th>
                            <th class="px-4 py-3">Gimnasio</th>
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $userRow)
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                                <td class="px-4 py-3">{{ $userRow->id }}</td>
                                <td class="px-4 py-3">{{ $userRow->name }}</td>
                                <td class="px-4 py-3">{{ $userRow->gender }}</td>
                                <td class="px-4 py-3">{{ $userRow->birth_date }}</td>
                                <td class="px-4 py-3">{{ $userRow->phone_number }}</td>
                                <td class="px-4 py-3">{{ $userRow->state }}</td>
                                <td class="px-4 py-3">{{ $userRow->gym->name }}</td>
                                <td class="px-4 py-3 flex space-x-2">
                                    <a href="{{ route('users.edit', $userRow->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                        Editar
                                    </a>
                                    <form action="{{ route('users.destroy', $userRow->id) }}" method="POST"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
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
        </main>
    </div>
</body>


</html>
