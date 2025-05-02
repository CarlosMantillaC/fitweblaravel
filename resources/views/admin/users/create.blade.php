<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#0A0A0A] text-white min-h-screen p-4 sm:p-6 md:p-8">

<div class="bg-[#151515] max-w-md sm:max-w-xl mx-auto p-4 sm:p-9 rounded-lg shadow-lg">

        <!-- Botón Atrás -->
        <div class="mb-4">
            <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.users' : 'receptionist.users') }}"
                class="inline-flex items-center text-orange-400 hover:text-orange-300 bg-transparent hover:bg-[#151515] px-3 py-2 rounded transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Volver atrás
            </a>
        </div>

        <h1 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-center">Registrar Nuevo Usuario</h1>

        <form method="POST"
            action="{{ route(class_basename($user) === 'Admin' ? 'admin.users.store' : 'receptionist.users.store') }}"
            class="space-y-4 sm:space-y-6">
            @csrf

            <input type="hidden" name="gym_id" value="{{ $gym->id }}">

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-300 mb-1">Nombre</label>
                <input type="text" name="name" required
                    class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                    focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                    transition-all duration-500 placeholder-gray-400 text-base"
                    placeholder="Escribe el nombre...">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-1">
                    

                <div x-data="{
                    open: false,
                    selected: '{{ request('gender') ?? 'all' }}',
                    options: ['M', 'F']
                }" class="relative w-full">
                        <label class="block text-sm sm:text-base text-gray-300">Género</label>
                        <button @click.prevent="open = !open" @keydown.escape.window="open = false" type="button"
                            class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl text-left
                            focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none
                            transition-all duration-300 flex justify-between items-center">
                            <span x-text="selected === 'M' ? 'Masculino' : selected"></span>
                            <svg class="w-4 h-4 ml-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul x-show="open" x-cloak x-transition @click.outside="open = false"
                            class="absolute z-10 mt-2 w-full bg-[#252525] border border-gray-700 rounded-xl shadow-lg">
                            <template x-for="option in options" :key="option">
                                <li @click="selected = option; open = false"
                                    :class="{'bg-[#f36100] text-white': selected === option}"
                                    class="px-4 py-2 cursor-pointer transition-all duration-300">
                                    <span x-text="option === 'M' ? 'Masculino' : option"></span>
                                </li>
                            </template>
                        </ul>
                        <input type="hidden" name="gender" :value="selected">
                    </div>
                </div>
                

                <div class="space-y-1">
                    <label class="block text-sm sm:text-base text-gray-300">Fecha de nacimiento</label>
                    <input type="date" name="birth_date" required
                        class="w-full py-2 px-3 rounded-xl bg-[#252525] text-white border border-gray-700 
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                        transition-all duration-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-1">
                    <label class="block text-sm sm:text-base text-gray-300">Teléfono</label>
                    <input type="text" name="phone_number" required
                        class="w-full py-2 px-3 rounded-xl bg-[#252525] text-white border border-gray-700 
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                        transition-all duration-500"
                        placeholder="Escribe el teléfono...">
                </div>
                              

                <div class="space-y-1">
                    <label class="block text-sm sm:text-base text-gray-300">Email</label>
                    <input type="text" name="email" required
                        class="w-full py-2 px-3 rounded-xl bg-[#252525] text-white border border-gray-700 
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                        transition-all duration-500"
                        placeholder="Escribe el correo electrónico...">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-1">
                    <label class="block text-sm sm:text-base text-gray-300">Estado</label>
                    <div x-data="{
                        open: false,
                        selected: '{{ old('state') ?? 'inactivo' }}',
                        options: ['inactivo', 'activo']
                    }" class="relative w-full">
                        <button @click.prevent="open = !open" @keydown.escape.window="open = false" type="button"
                            class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl text-left
                            focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none
                            transition-all duration-300 flex justify-between items-center">
                            <span x-text="selected === 'inactivo' ? 'Inactivo' : 'Activo'"></span>
                            <svg class="w-4 h-4 ml-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul x-show="open" x-cloak x-transition @click.outside="open = false"
                            class="absolute z-10 mt-2 w-full bg-[#252525] border border-gray-700 rounded-xl shadow-lg">
                            <template x-for="option in options" :key="option">
                                <li @click="selected = option; open = false"
                                    :class="{'bg-[#f36100] text-white': selected === option}"
                                    class="px-4 py-2 cursor-pointer transition-all duration-300">
                                    <span x-text="option === 'inactivo' ? 'Inactivo' : 'Activo'"></span>
                                </li>
                            </template>
                        </ul>
                        <input type="hidden" name="state" :value="selected">
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full sm:w-auto bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 sm:py-3 rounded-lg mt-4 sm:mt-6 mx-auto block transition duration-300 transform hover:scale-105">
                Guardar Usuario
            </button>
        </form>
    </div>
</body>

</html>
