@extends('admin.layouts.app')

@section('title')
    @php
        $role = class_basename($user);
    @endphp
    {{ $role === 'Admin' ? 'Admin Dashboard' : ($role === 'Receptionist' ? 'Receptionista Dashboard' : 'Dashboard') }}
@endsection

@section('content')
    <main class="flex-1 p-4 lg:p-8 mt-1 lg:mt-0">
        <!-- Encabezado -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-[#f36100] transition-all duration-300">
                Membresías - <span class="text-white">{{ $role === 'Admin' ? 'Admin' : 'Recepcionista' }}</span>
            </h1>
            <a href="{{ route($role === 'Admin' ? 'admin.memberships.create' : 'receptionist.memberships.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto text-center">
                + Agregar Membresía
            </a>
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

                <!-- Buscar general -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-300 mb-1">Buscar</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                           focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                           transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Tipo, monto, descuento, fechas, nombre usuario...">
                </div>

                <div>
                    <label for="id" class="block text-sm font-medium text-gray-300 mb-1">ID</label>
                    <input type="text" name="id" value="{{ request('id') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                        transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Buscar por ID">
                </div>

                <!-- Filtro por id de usuario -->
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-300 mb-1">Cédula del Usuario</label>
                    <input type="text" name="user_id" id="user_id" value="{{ request('user_id') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                           focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                           transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Buscar por Cédula">
                </div>

                <!-- Filtro por tipo -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-300 mb-1">Tipo</label>
                    <select name="type" id="type"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none transition-all duration-300 text-base">
                        <option value="all">Todos</option>
                        @foreach ($types as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <!-- Fecha de inicio -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-300 mb-1">Desde</label>
                    <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl 
                           focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                           transition-all duration-500 text-base">
                </div>

                <!-- Fecha de fin -->
                <div>
                    <label for="finish_date" class="block text-sm font-medium text-gray-300 mb-1">Hasta</label>
                    <input type="date" name="finish_date" id="finish_date" value="{{ request('finish_date') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl 
                           focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                           transition-all duration-500 text-base">
                </div>


                <!-- Botones -->
                <div class="flex items-end gap-2 col-span-1 md:col-span-2">
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

                <!-- Selector per_page -->
                <div class="flex items-center gap-2 md:col-span-4">
                    <label for="per_page" class="text-sm text-gray-300">Mostrar:</label>

                    <!-- Dropdown personalizado -->
                    <div class="relative w-24">
                        <button @click.prevent="open = !open" @keydown.escape.window="open = false" type="button"
                            class="w-full bg-[#252525] border border-gray-600 rounded-md px-3 py-[6px] text-white text-sm
                            hover:border-[#f36100] focus:outline-none focus:ring-2 focus:ring-[#f36100] transition-all duration-300 flex justify-between items-center">
                            <span x-text="selected"></span>
                            <svg class="w-4 h-4 ml-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
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
                                <th class="px-4 py-3 text-sm text-gray-300">ID</th>
                                <th class="px-4 py-3 text-sm text-gray-300">Nombre del Usuario</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Cédula</th>
                                <th class="px-4 py-3 text-sm text-gray-300">Tipo</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Monto</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden md:table-cell">Descuento</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Inicio</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Fin</th>
                                @if ($role === 'Admin')
                                    <th class="px-4 py-3 text-sm text-gray-300">Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($memberships as $membership)
                                <tr
                                    class="border-b border-gray-700 hover:bg-[#252525] hover:text-white transition duration-300">
                                    <td class="px-4 py-3 text-sm text-white">{{ $membership->id }}</td>
                                    <td class="px-4 py-3 text-sm text-white">{{ $membership->user->name }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        {{ $membership->user->id }}</td>
                                    <td class="px-4 py-3 text-sm text-white">{{ $membership->type }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        ${{ number_format($membership->amount, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden md:table-cell">
                                        {{ $membership->discount }}%</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        {{ \Carbon\Carbon::parse($membership->start_date)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        {{ \Carbon\Carbon::parse($membership->finish_date)->format('d/m/Y') }}
                                    </td>

                                    @if ($role === 'Admin')
                                        <td class="px-4 py-3 flex gap-2">
                                            <a href="{{ route('memberships.edit', $membership->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm transition duration-300">
                                                Editar
                                            </a>
                                            <form action="{{ route('memberships.destroy', $membership->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar esta membresía?')">
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
                                    <td colspan="{{ $role === 'Admin' ? 9 : 8 }}"
                                        class="text-center px-4 py-6 text-gray-400">
                                        No hay membresías registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4 px-4 py-3 flex items-center justify-between border-t border-gray-700 sm:px-6">
                        {{ $memberships->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
