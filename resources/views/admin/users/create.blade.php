<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-300 mb-1">Cédula</label>
                    <input type="number" name="id" required
                    class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                    focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                    transition-all duration-500 placeholder-gray-400 text-base"
                    placeholder="Escribe la Cédula">
                </div>

                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-300 mb-1">Nombre</label>
                    <input type="text" name="name" required
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                        transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Escribe el nombre">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <!-- Select de Género Mejorado -->
                <div class="space-y-1" x-data="{ 
                    gender: '{{ $user->gender }}',
                    open: false,
                    options: [
                        { value: 'M', label: 'Masculino', icon: '♂' },
                        { value: 'F', label: 'Femenino', icon: '♀' }
                    ]
                }">
                    <label class="block text-sm font-medium text-gray-300 mb-1">Género</label>
                    
                    <div class="relative">
                        <button @click="open = !open" type="button"
                            class="w-full flex justify-between items-center py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                            hover:border-gray-600 focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]
                            transition-all duration-300 text-left"
                            :class="{ 'ring-2 ring-[#f36100]': open }">
                            <span x-text="options.find(opt => opt.value === gender)?.label || 'Seleccione género'"></span>
                            <svg class="h-5 w-5 text-gray-400 transition-transform duration-200" 
                                 :class="{ 'rotate-180': open }" 
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute z-10 mt-1 w-full bg-[#252525] border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                            <ul class="py-1">
                                <template x-for="option in options" :key="option.value">
                                    <li>
                                        <button type="button" @click="gender = option.value; open = false"
                                            class="w-full px-4 py-2 text-left hover:bg-[#f36100] flex items-center space-x-2"
                                            :class="{ 'bg-[#f36100]': gender === option.value }">
                                            <span x-text="option.icon" class="text-lg"></span>
                                            <span x-text="option.label"></span>
                                        </button>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                    
                    <input type="hidden" name="gender" x-model="gender">
                    
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
                <!-- Select de Estado Mejorado -->
                <div class="space-y-1" x-data="{ 
                    state: 'Inactivo',
                    open: false,
                    options: ['Activo', 'Inactivo']
                }">
                    <label class="block text-sm sm:text-base text-gray-300">Estado</label>
                    
                    <div class="relative">
                        <button @click="open = !open" type="button"
                            class="w-full flex justify-between items-center py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                            hover:border-gray-600 focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]
                            transition-all duration-300 text-left"
                            :class="{ 'ring-2 ring-[#f36100]': open }">
                            <span x-text="state"></span>
                            <svg class="h-5 w-5 text-gray-400 transition-transform duration-200" 
                                 :class="{ 'rotate-180': open }" 
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute z-10 mt-1 w-full bg-[#252525] border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                            <ul class="py-1">
                                <template x-for="option in options" :key="option">
                                    <li>
                                        <button type="button" @click="state = option; open = false"
                                            class="w-full px-4 py-2 text-left hover:bg-[#f36100] transition-colors duration-200">
                                            <span x-text="option"></span>
                                            <span x-show="state === option" class="float-right">✓</span>
                                        </button>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                    
                    <input type="hidden" name="state" x-model="state">
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
