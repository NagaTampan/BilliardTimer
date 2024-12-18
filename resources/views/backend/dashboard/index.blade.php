@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Billiard</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS (Animate on Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-600">Billing Dashboard</h1>

        <!-- Stats Cards Container -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Jumlah Meja yang Sudah Digunakan Hari Ini -->
            <div 
                data-aos="fade-up" 
                data-aos-delay="100" 
                class="bg-white p-6 rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl group"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-gray-700 group-hover:text-blue-600 transition">
                            <i class="fas fa-table mr-2 text-blue-500"></i>Meja Digunakan Hari Ini
                        </h2>
                        <p class="text-4xl font-bold text-blue-600">{{ $tablesUsedToday }} Meja</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-chart-bar text-3xl text-blue-500 opacity-75"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2: Total Waktu Bermain Hari Ini -->
            <div 
                data-aos="fade-up" 
                data-aos-delay="200" 
                class="bg-white p-6 rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl group"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-gray-700 group-hover:text-green-600 transition">
                            <i class="fas fa-clock mr-2 text-green-500"></i>Total Waktu Bermain
                        </h2>
                        <p class="text-4xl font-bold text-green-600">{{ $hours }} Jam {{ $minutes }} Menit</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-stopwatch text-3xl text-green-500 opacity-75"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3: Pendapatan Harian -->
            <div 
                data-aos="fade-up" 
                data-aos-delay="300" 
                class="bg-white p-6 rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl group"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-gray-700 group-hover:text-red-600 transition">
                            <i class="fas fa-money-bill-wave mr-2 text-red-500"></i>Pendapatan Harian
                        </h2>
                        <p class="text-4xl font-bold text-red-600">Rp {{ number_format($dailyRevenue, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <i class="fas fa-cash-register text-3xl text-red-500 opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div 
            data-aos="fade-up" 
            data-aos-delay="400" 
            class="bg-white mt-8 p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300"
        >
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">
                <i class="fas fa-chart-line mr-2 text-purple-500"></i>Pendapatan dan Total Bermain Bulanan
            </h2>
            
            <canvas id="monthlyChart" class="w-full h-96"></canvas>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Chart Configuration
        var ctx = document.getElementById('monthlyChart').getContext('2d');
        var monthlyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($monthlyLabels), // Label bulan
                datasets: [
                    {
                        label: 'Pendapatan Bulanan',
                        data: @json($monthlyRevenueData), // Data pendapatan per bulan
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        borderRadius: 10
                    },
                    {
                        label: 'Total Bermain Bulanan (Jam)',
                        data: @json($monthlyPlayTimeData), // Data total waktu bermain per bulan
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        borderRadius: 10
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    </script>
</body>
</html>

@endsection
