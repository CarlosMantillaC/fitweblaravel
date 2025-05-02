@extends('admin.layouts.app')

@section('title')
    @php
        $role = class_basename($user);
    @endphp
    {{ $role === 'Admin' ? 'Admin Dashboard' : ($role === 'Receptionist' ? 'Receptionista Dashboard' : 'Dashboard') }}
@endsection

@section('content')
    <main class="flex-1 p-4 lg:p-8 mt-1 lg:mt-0" x-data="{ 
        showCreateModal: false,
        showEditModal: false,
        currentEditUser: null
    }">

        <!-- Título -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-[#f36100] transition-all duration-300">
                Usuarios - <span class="text-white">{{ $role === 'Admin' ? 'Admin' : 'Recepcionista' }}</span>
            </h1>
            <button @click="showCreateModal = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto text-center">
                + Agregar Usuario
            </button>
        </div>

        <!-- Modal para crear usuario -->
        <!-- Modal backdrop -->
        <div x-show="showCreateModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm"
            @click="showCreateModal = false">
        </div>

        <!-- Modal content -->
        <div x-show="showCreateModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-50 flex items-center justify-center p-4"
            @keydown.escape.window="showCreateModal = false">

            <div class="bg-[#151515] w-full max-w-2xl rounded-lg shadow-xl overflow-hidden">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-4 border-b border-gray-700">
                    <h2 class="text-xl font-bold text-tertiary">Registrar Nuevo Usuario</h2>
                    <button @click="showCreateModal = false" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 overflow-y-auto max-h-[80vh]">
                    @include('admin.users.create')
                </div>
            </div>
        </div>


        <!-- Modal para editar usuario -->
        <div x-show="showEditModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm"
            @click="showEditModal = false">
        </div>

        <div x-show="showEditModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-50 flex items-center justify-center p-4"
            @keydown.escape.window="showEditModal = false">

            <div class="bg-[#151515] w-full max-w-3xl rounded-lg shadow-xl overflow-hidden">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-4 border-b border-gray-700">
                    <h2 class="text-xl font-bold text-tertiary">Editar Usuario</h2>
                    <button @click="showEditModal = false" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 overflow-y-auto max-h-[80vh]">
                    <div x-show="currentEditUser" x-transition>
                        @include('admin.users.edit', ['editUser' => $users->first()])
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="bg-[#151515] p-4 rounded-lg shadow mb-6">
            <form x-data="{
                selected: '{{ request('per_page', 10) }}',
                options: [5, 10, 25, 50, 100],
                open: false,
                selectAndSubmit(option) {
                    this.selected = option;
                    this.open = false;
                    this.$nextTick(() => {
                        this.$refs.input.value = option;
                        this.$refs.form.submit();
                    });
                }
            }" x-ref="form" action="{{ url()->current() }}" method="GET"
                class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <!-- Buscar -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-300 mb-1">Buscar</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Nombre, email, teléfono...">
                </div>

                <div>
                    <label for="id" class="block text-sm font-medium text-gray-300 mb-1">Cédula</label>
                    <input type="text" name="id" value="{{ request('id') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Buscar por Cédula">
                </div>

                <!-- Estado -->
                <div x-data="{
                    open: false,
                    selected: '{{ request('state') ?? 'all' }}',
                    options: ['all', 'Activo', 'Inactivo']
                }" class="relative w-full">
                    <label for="state" class="block text-sm font-medium text-gray-300 mb-1">Estado</label>
                    <button @click.prevent="open = !open" @keydown.escape.window="open = false" type="button"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl text-left
                focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none
                transition-all duration-300 flex justify-between items-center">
                        <span x-text="selected === 'all' ? 'Todos' : selected"></span>
                        <svg class="h-5 w-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <ul x-show="open" x-cloak x-transition @click.outside="open = false"
                        class="absolute z-10 mt-2 w-full bg-[#252525] border border-gray-700 rounded-xl shadow-lg">
                        <template x-for="option in options" :key="option">
                            <li @click="selected = option; open = false"
                                :class="{ 'bg-[#f36100] text-white': selected === option }"
                                class="px-4 py-2 cursor-pointer transition-all duration-300">
                                <span x-text="option === 'all' ? 'Todos' : option"></span>
                            </li>
                        </template>
                    </ul>
                    <input type="hidden" name="state" :value="selected">
                </div>

                <!-- Género -->
                <div x-data="{
                    open: false,
                    selected: '{{ request('gender') ?? 'all' }}',
                    options: ['all', 'M', 'F']
                }" class="relative w-full">
                    <label for="gender" class="block text-sm font-medium text-gray-300 mb-1">Género</label>
                    <button @click.prevent="open = !open" @keydown.escape.window="open = false" type="button"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl text-left
                focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none
                transition-all duration-300 flex justify-between items-center">
                        <span x-text="selected === 'all' ? 'Todos' : selected === 'M' ? 'Masculino' : 'Femenino'"></span>
                        <svg class="h-5 w-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <ul x-show="open" x-cloak x-transition @click.outside="open = false"
                        class="absolute z-10 mt-2 w-full bg-[#252525] border border-gray-700 rounded-xl shadow-lg">
                        <template x-for="option in options" :key="option">
                            <li @click="selected = option; open = false"
                                :class="{ 'bg-[#f36100] text-white': selected === option }"
                                class="px-4 py-2 cursor-pointer transition-all duration-300">
                                <span
                                    x-text="option === 'all' ? 'Todos' : option === 'M' ? 'Masculino' : 'Femenino'"></span>
                            </li>
                        </template>
                    </ul>
                    <input type="hidden" name="gender" :value="selected">
                </div>

                <!-- Botones de acción -->
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

                <!-- Selector de items por página -->
                <div class="flex items-center gap-2 md:col-span-4">
                    <label for="per_page" class="text-sm text-gray-300">Mostrar:</label>

                    <!-- Dropdown personalizado -->
                    <div class="relative w-24">
                        <button @click.prevent="open = !open" @keydown.escape.window="open = false" type="button"
                            class="w-full bg-[#252525] border border-gray-600 rounded-md px-3 py-[6px] text-white text-sm
                    hover:border-[#f36100] focus:outline-none focus:ring-2 focus:ring-[#f36100] transition-all duration-300 flex justify-between items-center">
                            <span x-text="selected"></span>
                            <svg class="h-5 w-5 text-gray-400 transition-transform duration-200" 
                            :class="{ 'rotate-180': open }" 
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                           <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                       </svg>
                        </button>

                        <ul x-show="open" x-cloak x-transition @click.outside="open = false"
                            class="absolute z-10 mt-2 w-full bg-[#252525] border border-gray-600 rounded-md shadow-lg">
                            <template x-for="option in options" :key="option">
                                <li @click="selectAndSubmit(option)"
                                    :class="{ 'bg-[#f36100] text-white': selected == option }"
                                    class="px-4 py-2 cursor-pointer transition-all duration-300 hover:bg-[#f36100]/80">
                                    <span x-text="option"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <span class="text-sm text-gray-400">registros</span>
                    <input type="hidden" name="per_page" x-ref="input" :value="selected">
                </div>
            </form>
        </div>


        <!-- Tabla -->
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full bg-[#151515] rounded-lg shadow-lg text-center">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="px-4 py-3 text-sm text-gray-300">Cédula</th>
                                <th class="px-4 py-3 text-sm text-gray-300">Nombre</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Género</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden md:table-cell">Fecha Nac.</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Teléfono</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Email</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden md:table-cell">Estado</th>
                                @if ($role === 'Admin')
                                    <th class="px-4 py-3 text-sm text-gray-300">Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $userRow)
                                <tr
                                    class="border-b border-gray-700 hover:bg-[#252525] hover:text-white transition duration-300">
                                    <td class="px-4 py-3 text-sm text-white">{{ $userRow->id }}</td>
                                    <td class="px-4 py-3 text-sm text-white">{{ $userRow->name }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">{{ $userRow->gender }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-white hidden md:table-cell">
                                        {{ \Carbon\Carbon::parse($userRow->birth_date)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        {{ $userRow->phone_number }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">{{ $userRow->email }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-white hidden md:table-cell">{{ $userRow->state }}
                                    </td>
                                    @if ($role === 'Admin')
                                        <td class="px-4 py-3 flex gap-2">
                                            <button 
                                            @click="currentEditUser = {{ json_encode($userRow) }}; showEditModal = true"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm transition duration-300">
                                            Editar
                                        </button>
                                            <!-- Botón para eliminar -->
                                            <div x-data="{ showConfirm: false }">
                                                <button type="button" @click="showConfirm = true"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition duration-300">
                                                    Eliminar
                                                </button>

                                                <!-- Modal de confirmación -->
                                                <div x-show="showConfirm" x-cloak x-transition
                                                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">

                                                    <div
                                                        class="bg-[#151515] p-6 rounded-xl shadow-xl border border-gray-600 w-full max-w-sm text-center relative">

                                                        <!-- Ícono de advertencia -->
                                                        <div class="text-red-500 text-4xl mb-4">⚠️</div>

                                                        <h2 class="text-lg font-semibold text-white mb-2">¿Estás seguro?
                                                        </h2>
                                                        <p class="text-gray-400 text-sm mb-6">Esta acción no se puede
                                                            deshacer. El usuario será eliminado permanentemente.</p>

                                                        <div class="flex justify-center gap-4 mt-4">
                                                            <button @click="showConfirm = false"
                                                                class="px-4 py-2 border border-gray-500 text-gray-300 rounded hover:border-[#f36100] hover:text-[#f36100] transition-all">
                                                                Cancelar
                                                            </button>

                                                            <form action="{{ route('users.destroy', $userRow->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white hover:text-[#0A0A0A] rounded transition-all">
                                                                    Sí, eliminar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $role === 'Admin' ? 8 : 7 }}"
                                        class="text-center px-4 py-6 text-gray-400">
                                        No hay usuarios registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4 px-4 py-3 flex items-center justify-between border-t border-gray-700 sm:px-6">
                        {{ $users->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
