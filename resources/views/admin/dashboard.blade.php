@extends('admin.layouts.app')

@section('content')
    <main class="flex-1 p-6 bgp">
        <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-center md:text-left">Bienvenido al Dashboard</h2>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h2 class="text-xl font-bold text-center mb-4">Usuarios por Estado</h2>

                <!-- Selector de periodo -->
                <div class="mb-4 text-center">
                    <label for="periodSelect" class="text-white mr-2">Periodo:</label>
                    <select id="periodSelect" class="bg-gray-800 text-white rounded px-2 py-1">
                        <option value="all">Todos</option>
                        <option value="today">Hoy</option>
                        <option value="this_month">Este mes</option>
                        <option value="last_month">Mes pasado</option>
                        <option value="two_months_ago">Hace dos meses</option>
                    </select>
                </div>

                <canvas id="usuariosChart" width="400" height="400"></canvas>

                <script>
                    const ctx = document.getElementById('usuariosChart').getContext('2d');
                    let usuariosChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Activos', 'Inactivos'],
                            datasets: [{
                                label: 'Usuarios',
                                data: [{{ $activos }}, {{ $inactivos }}],
                                backgroundColor: [
                                    'rgba(34, 197, 94, 0.7)',
                                    'rgba(239, 68, 68, 0.7)'
                                ],
                                borderColor: [
                                    'rgba(34, 197, 94, 1)',
                                    'rgba(239, 68, 68, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        color: '#fff'
                                    }
                                }
                            }
                        }
                    });

                    document.getElementById('periodSelect').addEventListener('change', function() {
                        const period = this.value;

                        fetch(`{{ route('user.stats') }}?period=${period}`)
                            .then(response => response.json())
                            .then(data => {
                                usuariosChart.data.datasets[0].data = [data.activos, data.inactivos];
                                usuariosChart.update();
                            })
                            .catch(error => {
                                console.error('Error al cargar datos:', error);
                            });
                    });
                </script>
            </div>

            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h2 class="text-xl font-bold text-center mb-4">Nuevos Usuarios por Mes</h2>
                <canvas id="usersLineChart" width="400" height="400"></canvas>

                <script>
                    const lineCtx = document.getElementById('usersLineChart').getContext('2d');

                    fetch('/dashboard/users-by-month')
                        .then(res => res.json())
                        .then(data => {
                            const labels = data.map(entry => entry.mes);
                            const totals = data.map(entry => entry.total);

                            new Chart(lineCtx, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Nuevos Usuarios',
                                        data: totals,
                                        borderColor: '#34D399',
                                        backgroundColor: 'rgba(52, 211, 153, 0.2)',
                                        tension: 0.3,
                                        fill: true
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                            labels: {
                                                color: '#fff'
                                            }
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            ticks: {
                                                precision: 0,
                                                stepSize: 1,
                                                color: '#fff'
                                            },
                                            grid: {
                                                color: 'rgba(255,255,255,0.1)'
                                            }
                                        },
                                        x: {
                                            ticks: {
                                                color: '#fff'
                                            },
                                            grid: {
                                                color: 'rgba(255,255,255,0.1)'
                                            }
                                        }
                                    }
                                }
                            });
                        })
                        .catch(err => console.error('Error cargando datos de usuarios por mes:', err));
                </script>
            </div>

            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium">Estadística 3</h3>
                <p class="mt-2 text-gray-400">Contenido de la estadística.</p>
            </div>
        </div>
    </main>
@endsection
