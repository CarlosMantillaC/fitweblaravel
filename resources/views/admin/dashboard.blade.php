@extends('admin.layouts.app')

@section('content')
<main class="flex-1 p-6 bg-primary">
    <h2 class="text-3xl md:text-3xl font-semibold mb-2 text-center md:text-left">
        <span class="text-[#f36100]">Bienvenido</span> <span class="text-white">al Dashboard</span>
    </h2>
    
    <!-- Línea decorativa -->
    <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent my-4"></div>


    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-[#1f1f1f] p-6 rounded-xl shadow-lg border border-[#2a2a2a]">
             <h2 class="text-xl font-bold text-center mb-4 text-white">Usuarios por Estado</h2>

                <!-- Selector de periodo -->
                <div class="mb-4 text-center">
                    <label for="periodSelect" class="text-white mr-2">Periodo:</label>
                    <select id="periodSelect" class="text-white rounded px-2 py-1" style="background-color: #252525;">
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

                    // Crear gradientes oscuros personalizados
                    const gradienteActivo = ctx.createLinearGradient(0, 0, 0, 400);
                    gradienteActivo.addColorStop(0, '#00FFA3');  // Verde neón
                    gradienteActivo.addColorStop(1, '#00664F');  // Verde oscuro

                    const gradienteInactivo = ctx.createLinearGradient(0, 0, 0, 400);
                    gradienteInactivo.addColorStop(0, '#FF4C60');  // Rojo fucsia
                    gradienteInactivo.addColorStop(1, '#800020');  // Rojo vino oscuro

                    let usuariosChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Activos', 'Inactivos'],
                            datasets: [{
                                label: 'Usuarios',
                                data: [{{ $activos }}, {{ $inactivos }}],
                                backgroundColor: [gradienteActivo, gradienteInactivo],
                                borderColor: ['#00FFA3', '#FF4C60'],
                                borderWidth: 2
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

            <div class="bg-[#1f1f1f] p-6 rounded-xl shadow-lg border border-[#2a2a2a]">
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

             <div class="bg-[#1f1f1f] p-6 rounded-xl shadow-lg border border-[#2a2a2a]">
                <h3 class="text-lg font-medium">Estadística 3</h3>
                <p class="mt-2 text-gray-400">Contenido de la estadística.</p>
            </div>
        </div>
    </main>
@endsection
