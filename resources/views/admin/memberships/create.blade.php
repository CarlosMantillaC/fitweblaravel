<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Membresía</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-900 text-white min-h-screen p-4 sm:p-6 md:p-8">
    <div class="max-w-md sm:max-w-xl mx-auto bg-gray-800 p-4 sm:p-6 rounded-lg shadow-lg">

        <!-- Botón Atrás -->
        <div class="mb-4">
            <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.memberships' : 'receptionist.memberships') }}"
                class="inline-flex items-center text-orange-400 hover:text-orange-300 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Volver atrás
            </a>
        </div>
        <h1 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-center">Registrar Nueva Membresía</h1>

        <form method="POST" action="{{ route('admin.memberships.store') }}" class="space-y-4 sm:space-y-6">
            @csrf

            <div class="space-y-1">
                <label for="type" class="block text-sm sm:text-base">Tipo</label>
                <select name="type" required
                    class="w-full p-2 sm:p-3 rounded bg-gray-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <option value="Mensual">Mensual</option>
                    <option value="Diaria">Diaria</option>
                    <option value="Trimestral">Trimestral</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-1">
                    <label class="block text-sm sm:text-base">Monto</label>
                    <input type="number" step="0.01" name="amount" required
                        class="w-full p-2 sm:p-3 rounded bg-gray-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                        placeholder="Ej: 150000">
                </div>

                <div class="space-y-1">
                    <label class="block text-sm sm:text-base">Descuento (%)</label>
                    <input type="number" step="0.01" name="discount" value="0"
                        class="w-full p-2 sm:p-3 rounded bg-gray-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                        placeholder="Ej: 10">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-1">
                    <label class="block text-sm sm:text-base">Fecha de inicio</label>
                    <input type="date" name="start_date" required
                        class="w-full p-2 sm:p-3 rounded bg-gray-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>

                <div class="space-y-1">
                    <label class="block text-sm sm:text-base">Fecha de fin</label>
                    <input type="date" name="finish_date" required
                        class="w-full p-2 sm:p-3 rounded bg-gray-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
            </div>

            <div class="space-y-1">
                <label class="block text-sm sm:text-base">Cédula del Usuario</label>
                <input type="text" name="user_id" required
                    class="w-full p-2 sm:p-3 rounded bg-gray-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                    placeholder="Ingrese la cédula del usuario">
            </div>

            <button type="submit"
                class="w-full sm:w-auto bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 sm:py-3 rounded-lg mt-4 sm:mt-6 mx-auto block transition duration-300 transform hover:scale-105">
                Guardar Membresía
            </button>
        </form>
    </div>
</body>
</html>