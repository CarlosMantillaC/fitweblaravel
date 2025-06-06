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
        currentEditPayment: null,
    }">

        @include('components.modals', [
            // Encabezado
            'title' => 'Pagos',
            'subtitle' => $role === 'Admin' ? 'Admin' : 'Recepcionista',
            'buttonText' => 'Registrar Pago',
        
            // Crear
            'createShowVar' => 'showCreateModal',
            'createTitle' => 'Registrar Nuevo Pago',
            'createView' => 'admin.payments.create',
            'createParams' => [
                'users' => $users,
                'methods' => ['efectivo', 'bancolombia', 'nequi', 'daviplata'],
            ],
        
            // Editar
            'editShowVar' => 'showEditModal',
            'editTitle' => 'Editar Pago',
            'editCondition' => 'currentEditPayment',
            'editView' => 'admin.payments.edit',
            'editParams' => [
                'editPayment' => $payments->first(),
                'users' => $users,
                'methods' => ['efectivo', 'bancolombia', 'nequi', 'daviplata'],
            ],
        ])


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
                        placeholder="Nombre del usuario, método...">
                </div>

                <div>
                    <label for="id" class="block text-sm font-medium text-gray-300 mb-1">ID</label>
                    <input type="text" name="id" value="{{ request('id') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                        transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Buscar por ID">
                </div>

                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-300 mb-1">Cédula del Usuario</label>
                    <input type="text" name="user_id" id="user_id" value="{{ request('user_id') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                           focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                           transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Buscar por Cédula">
                </div>

                <!-- Membresía -->
                <div>
                    <label for="membership_id" class="block text-sm font-medium text-gray-300 mb-1">Membresía</label>
                    <input type="text" name="membership_id" id="membership_id" value="{{ request('membership_id') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                       focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                       transition-all duration-500 placeholder-gray-400 text-base"
                        placeholder="Buscar por Cédula">
                </div>

                <!-- Fecha de pago -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-300 mb-1">Fecha de pago</label>
                    <input type="date" name="date" id="date" value="{{ request('date') }}"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none 
                        transition-all duration-500 text-base">
                </div>

                <!-- Método de Pago -->
                <div x-data="{
                    open: false,
                    selected: '{{ request('payment_method') ?? 'all' }}',
                    options: ['all', @foreach ($paymentMethods as $method) '{{ $method }}'@if (!$loop->last), @endif @endforeach]
                }" class="relative w-full">
                    <label for="payment_method" class="block text-sm font-medium text-gray-300 mb-1">Método</label>
                    <button @click.prevent="open = !open" @keydown.escape.window="open = false" type="button"
                        class="w-full py-2 px-3 bg-[#252525] text-white border border-gray-700 rounded-xl text-left
        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none
        transition-all duration-300 flex justify-between items-center">
                        <span
                            x-text="selected === 'all' ? 'Todos' : selected.charAt(0).toUpperCase() + selected.slice(1)"></span>
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
                                class="px-4 py-2 cursor-pointer transition-all duration-300 hover:bg-[#f36100] hover:text-white">
                                <span
                                    x-text="option === 'all' ? 'Todos' : option.charAt(0).toUpperCase() + option.slice(1)"></span>
                            </li>
                        </template>
                    </ul>
                    <input type="hidden" name="payment_method" :value="selected === 'all' ? '' : selected">
                </div>

                <!-- Botones -->
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

                <!-- Selector per_page -->
                <div class="flex items-center gap-2 md:col-span-4">
                    <label for="per_page" class="text-sm text-gray-300">Mostrar:</label>

                    <!-- Dropdown personalizado -->
                    <div class="relative w-24">
                        <button @click.prevent="open = !open" @keydown.escape.window="open = false" type="button"
                            class="w-full bg-[#252525] border border-gray-600 rounded-md px-3 py-[6px] text-white text-sm
                                            hover:border-[#f36100] focus:outline-none focus:ring-2 focus:ring-[#f36100] transition-all duration-300 flex justify-between items-center">
                            <span x-text="selected"></span>
                            <svg class="h-5 w-5 text-gray-400 transition-transform duration-200"
                                :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
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
        <div class="overflow-x-auto text-center">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full bg-[#151515] rounded-lg shadow-lg">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="px-4 py-3 text-sm text-gray-300">ID</th>
                                <th class="px-4 py-3 text-sm text-gray-300">Nombre del Usuario</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Cédula</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Membresia</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Monto</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Método</th>
                                <th class="px-4 py-3 text-sm text-gray-300 hidden sm:table-cell">Fecha</th>
                                @if ($role === 'Admin')
                                    <th class="px-4 py-3 text-sm text-gray-300">Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr
                                    class="border-b border-gray-700 hover:bg-[#252525] hover:text-white transition duration-300">
                                    <td class="px-4 py-3 text-sm text-white">{{ $payment->id }}</td>
                                    <td class="px-4 py-3 text-sm text-white">{{ $payment->user->name }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">{{ $payment->user->id }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        {{ $payment->membership_id }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        ${{ number_format($payment->amount, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        {{ $payment->payment_method }}</td>
                                    <td class="px-4 py-3 text-sm text-white hidden sm:table-cell">
                                        {{ \Carbon\Carbon::parse($payment->date)->format('d/m/Y') }}
                                    </td>
                                    @if ($role === 'Admin')
                                        <td class="ml-8 px-4 py-3 table-cell">
                                            <div class="flex justify-center items-center space-x-2">
                                                <button
                                                    @click="currentEditPayment = {
                                                ...{{ json_encode($payment) }},
                                                user_name: '{{ addslashes($payment->user->name) }}'
                                            }; showEditModal = true"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm transition duration-300">
                                                    Editar
                                                </button>

                                                <!-- Botón Eliminar como componente -->
                                                <x-delete-button :action="route('payments.destroy', $payment->id)" />
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $role === 'Admin' ? 7 : 6 }}"
                                        class="text-center px-4 py-6 text-gray-400">
                                        No hay pagos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4 px-4 py-3 flex items-center justify-center border-t border-gray-700 sm:px-6">
                        {{ $payments->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
