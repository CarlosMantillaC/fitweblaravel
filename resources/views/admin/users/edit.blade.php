<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (class_basename($user) === 'Admin')
            Admin Dashboard
        @elseif (class_basename($user) === 'Receptionist')
            Recepcionista Dashboard
        @else
            Dashboard
        @endif
    </title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#0A0A0A] text-white min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8">
    <div class="w-full max-w-3xl mx-auto bg-[#151515] p-4 sm:p-9 rounded-lg shadow-lg">
        
        <h2 class="text-3xl font-bold mb-8 text-[#f36100]">Editar Usuario</h2>

        <form action="{{ route('users.update', $editUser->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nombre</label>
                    <input type="text" name="name" id="name"
                        value="{{ old('name', $editUser->name) }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                               focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                               transition-all duration-500 placeholder-gray-400 text-base">
                </div>

                <!-- Género -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-300 mb-1">Género</label>
                    <select name="gender" id="gender"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                               focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                               transition-all duration-500 placeholder-gray-400 text-base">
                        <option value="M" {{ $editUser->gender === 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ $editUser->gender === 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>

                <!-- Fecha de nacimiento -->
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-300 mb-1">Fecha de nacimiento</label>
                    <input type="date" name="birth_date" id="birth_date"
                        value="{{ old('birth_date', $editUser->birth_date) }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                               focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                               transition-all duration-500 placeholder-gray-400 text-base">
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-300 mb-1">Teléfono</label>
                    <input type="text" name="phone_number" id="phone_number"
                        value="{{ old('phone_number', $editUser->phone_number) }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                               focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                               transition-all duration-500 placeholder-gray-400 text-base">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" id="email"
                        value="{{ old('email', $editUser->email) }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                               focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                               transition-all duration-500 placeholder-gray-400 text-base">
                </div>

                <!-- Estado -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-300 mb-1">Estado</label>
                    <select name="state" id="state"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                               focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                               transition-all duration-500 placeholder-gray-400 text-base">
                        <option value="Activo" {{ $editUser->state === 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ $editUser->state === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-2 mt-8">
                <a href="{{ route('admin.users') }}"
                    class="block w-full px-6 py-2 border border-gray-500 text-gray-300 text-center rounded-lg 
                           hover:border-[#f36100] hover:text-[#f36100] active:scale-95 transition-all duration-300 md:w-auto">
                    Cancelar
                </a>
                <button type="submit"
                    class="w-full px-6 py-2 bg-[#f36100] text-white rounded-lg 
                           hover:bg-[#ff6a00] hover:text-[#151515] active:scale-95 transition-all duration-300 cursor-pointer md:w-auto">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</body>

</html>
