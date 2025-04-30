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
            <h2 class="text-3xl font-bold mb-8">Editar Membresía</h2>

            <form action="{{ route('memberships.update', $membership->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="type" class="block font-semibold mb-1">Tipo</label>
                        <input type="text" name="type" id="type"
                            value="{{ old('type', $membership->type) }}"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="amount" class="block font-semibold mb-1">Monto</label>
                        <input type="number" step="0.01" name="amount" id="amount"
                            value="{{ old('amount', $membership->amount) }}"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="discount" class="block font-semibold mb-1">Descuento</label>
                        <input type="number" step="0.01" name="discount" id="discount"
                            value="{{ old('discount', $membership->discount) }}"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="start_date" class="block font-semibold mb-1">Fecha de inicio</label>
                        <input type="date" name="start_date" id="start_date"
                            value="{{ old('start_date', $membership->start_date) }}"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="finish_date" class="block font-semibold mb-1">Fecha de fin</label>
                        <input type="date" name="finish_date" id="finish_date"
                            value="{{ old('finish_date', $membership->finish_date) }}"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="user_id" class="block font-semibold mb-1">Usuario</label>
                        <select name="user_id" id="user_id"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                            @foreach ($users as $u)
                                <option value="{{ $u->id }}" {{ $membership->user_id == $u->id ? 'selected' : '' }}>
                                    {{ $u->name }} ({{ $u->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-8">
                    <a href="{{ route('admin.memberships') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">Cancelar</a>
                    <button type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
