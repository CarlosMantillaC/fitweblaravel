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
    @vite(['resources/css/app.css'])


</head>

<body class="bg-gray-900 text-white">

        <div class="min-h-screen bg-gray-900 text-white py-10 px-6 justify-center flex-1">
            <div class="max-w-6xl mx-auto bg-gray-800 rounded-lg shadow-lg p-10">
                <h2 class="text-3xl font-bold mb-8">Editar Usuario</h2>

                <form action="{{ route('users.update', $editUser->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block font-semibold mb-1">Nombre</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $editUser->name) }}"
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>

                        <div>
                            <label for="gender" class="block font-semibold mb-1">Género</label>
                            <select name="gender" id="gender"
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option value="M" {{ $editUser->gender === 'M' ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ $editUser->gender === 'F' ? 'selected' : '' }}>Femenino</option>
                            </select>
                        </div>

                        <div>
                            <label for="birth_date" class="block font-semibold mb-1">Fecha de nacimiento</label>
                            <input type="date" name="birth_date" id="birth_date"
                                value="{{ old('birth_date', $editUser->birth_date) }}"
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2  focus:ring-orange-500">
                        </div>

                        <div>
                            <label for="phone_number" class="block font-semibold mb-1">Teléfono</label>
                            <input type="text" name="phone_number" id="phone_number"
                                value="{{ old('phone_number', $editUser->phone_number) }}"
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2  focus:ring-orange-500">
                        </div>

                        <div>
                            <label for="email" class="block font-semibold mb-1">email</label>
                            <input type="text" name="email" id="email"
                                value="{{ old('email', $editUser->email) }}"
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2  focus:ring-orange-500">
                        </div>

                        <div>
                            <label for="state" class="block font-semibold mb-1">Estado</label>
                            <select name="state" id="state"
                                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option value="Inactivo" {{ $editUser->state === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                <option value="Activo" {{ $editUser->state === 'Activo' ? 'selected' : '' }}>Activo</option>
                            </select>
                        </div>

                    </div>

                    <div class="flex justify-end space-x-3 mt-8">
                        <a href="{{ route('admin.users') }}"
                            class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">Cancelar</a>
                        <button type="submit"
                            class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>

</body>

</html>
