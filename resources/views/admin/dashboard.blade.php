@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->
    <main class="flex-1 p-6 bg-gray-900">
        <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-center md:text-left">Bienvenido al Dashboard</h2>

        <!-- Cards responsive -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium">Estadística 1</h3>
                <p class="mt-2 text-gray-400">Contenido de la estadística.</p>
            </div>
            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium">Estadística 2</h3>
                <p class="mt-2 text-gray-400">Contenido de la estadística.</p>
            </div>
            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium">Estadística 3</h3>
                <p class="mt-2 text-gray-400">Contenido de la estadística.</p>
            </div>
        </div>
    </main>
@endsection
