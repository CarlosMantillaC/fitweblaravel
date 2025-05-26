<form method="POST" 
    action="{{ route('admin.attendance-users.store') }}"
    class="space-y-4 sm:space-y-6"
    x-data="{
        currentDateTime: {
            date: '',
            check_in: '',
            check_out: ''
        },
        getCurrentDateTime() {
            const now = new Date();
            
            // Formatear fecha (YYYY-MM-DD)
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            this.currentDateTime.date = `${year}-${month}-${day}`;
            
            // Formatear horas (HH:MM)
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const timeString = `${hours}:${minutes}`;
            
            this.currentDateTime.check_in = timeString;
            this.currentDateTime.check_out = timeString;
            
            // Actualizar los campos del formulario
            document.getElementById('date').value = this.currentDateTime.date;
            document.getElementById('check_in').value = this.currentDateTime.check_in;
            document.getElementById('check_out').value = this.currentDateTime.check_out;
            
            return this.currentDateTime;
        },
        setCurrentTime(field) {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            document.getElementById(field).value = `${hours}:${minutes}`;
        }
    }"
    x-init="currentDateTime.date = new Date().toISOString().split('T')[0]"
>
    @csrf

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
        <!-- ID Asistencia (opcional, puede ser autoincremental) -->
        <div class="space-y-1">
            <label class="block text-sm sm:text-base text-gray-300">ID Asistencia</label>
            <input type="text" readonly
                class="w-full py-2 px-3 rounded-xl bg-[#252525] text-gray-400 border border-gray-700 cursor-not-allowed"
                value="Automático">
        </div>

        <!-- Cédula -->
        <div class="space-y-1">
            <label class="block text-sm sm:text-base text-gray-300">Cédula</label>
            <input type="text" name="user_identifier" required
                class="w-full py-2 px-3 rounded-xl bg-[#252525] text-white border border-gray-700 
                    focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none transition-all"
                placeholder="Ingrese la cédula">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
        <!-- Fecha -->
        <div class="space-y-1">
            <label class="block text-sm sm:text-base text-gray-300">Fecha</label>
            <div class="relative">
                <input type="date" name="date" id="date" required
                    class="w-full py-2 px-3 rounded-xl bg-[#252525] text-white border border-gray-700 
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none transition-all">
                <button type="button" @click="getCurrentDateTime()"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-[#f36100]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Hora Entrada -->
        <div class="space-y-1">
            <label class="block text-sm sm:text-base text-gray-300">Hora Entrada</label>
            <div class="relative">
                <input type="time" name="check_in" id="check_in" required
                    class="w-full py-2 px-3 rounded-xl bg-[#252525] text-white border border-gray-700 
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none transition-all">
                <button type="button" @click="setCurrentTime('check_in')"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-[#f36100]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Hora Salida -->
        <div class="space-y-1">
            <label class="block text-sm sm:text-base text-gray-300">Hora Salida</label>
            <div class="relative">
                <input type="time" name="check_out" id="check_out"
                    class="w-full py-2 px-3 rounded-xl bg-[#252525] text-white border border-gray-700 
                        focus:border-[#f36100] focus:ring-2 focus:ring-[#f36100]/70 focus:outline-none transition-all">
                <button type="button" @click="setCurrentTime('check_out')"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-[#f36100]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Botón para capturar todos los datos actuales -->
    <div class="pt-2">
        <button type="button" @click="getCurrentDateTime()"
            class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Capturar fecha y hora actual
        </button>
    </div>

    <div class="flex justify-end gap-4 pt-6">
        <button type="button" @click="showCreateModal = false"
            class="px-4 py-2 border border-gray-500 text-gray-300 rounded hover:border-[#f36100] hover:text-[#f36100] transition-all">
            Cancelar
        </button>
        <button type="submit"
            class="px-6 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition duration-300">
            Registrar Asistencia
        </button>
    </div>
</form>