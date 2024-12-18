@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billiard Timer Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        /* Styling for number input arrows */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        .glassy-background {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.125);
        }
        .input-form {
            @apply w-full px-4 py-2 mb-4 bg-white/70 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300;
        }
        .save-button {
            @apply w-full py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-300 mb-4;
        }
        .start-button {
            @apply flex-1 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-300;
        }
        .stop-button {
            @apply flex-1 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-300;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 ">
<div class="grid grid-cols-3 gap-4 mb-6">
<!--Card Timer 1-->
<div class="container mx-auto max-w-md">
        <div 
            class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden transform transition-all duration-300 hover:scale-[1.02]" 
            data-aos="zoom-in-up"
        >
            <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white p-6 flex items-center justify-between">
                <div>
                    <i class="fas fa-billiard-ball text-3xl mr-4"></i>
                    <span class="text-2xl font-semibold tracking-wide">Billiard Tracker</span>
                </div>
                <div id="current-time" class="text-lg font-light opacity-80"></div>
            </div>
            
            <div class="p-6 space-y-5">
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="bg-blue-50 rounded-xl p-3 text-center">
                        <i class="fas fa-table text-blue-600 text-2xl mb-2"></i>
                        <div id="table-number-display" class="font-bold text-blue-800">Meja 1</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-3 text-center">
                        <i class="fas fa-clock text-green-600 text-2xl mb-2"></i>
                        <div id="timer-display-1" class="font-bold text-green-800">00:00</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-3 text-center">
                        <i class="fas fa-money-bill-wave text-purple-600 text-2xl mb-2"></i>
                        <div id="total-price-1" class="font-bold text-purple-800">Rp 0</div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="relative">
                        <input 
                            type="text" 
                            id="name-1" 
                            placeholder="Nama Pemain" 
                            class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                        >
                        <i class="fas fa-user absolute left-3 top-3.5 text-gray-400"></i>
                    </div>

                    <div class="relative">
                        <input 
                            type="number" 
                            id="price-1" 
                            placeholder="Harga per Menit" 
                            class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                        >
                        <i class="fas fa-money-bill-wave absolute left-3 top-3.5 text-gray-400"></i>
                    </div>

                    <div class="relative">
                        <input 
                            type="number" 
                            id="table-number-1" 
                            value="1"
                            min="1"
                            max="20"
                            placeholder="Nomor Meja" 
                            class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                            oninput="updateTableDisplay(this.value)"
                        >
                        <i class="fas fa-table absolute left-3 top-3.5 text-gray-400"></i>
                    </div>
                </div>

                <div id="output-1" class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 text-center text-green-800 text-lg"></div>

                <div class="grid grid-cols-2 gap-4">
                    <button 
                        onclick="startTimer(1)" 
                        class="bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition-all duration-300 flex items-center justify-center space-x-2"
                    >
                        <i class="fas fa-play"></i>
                        <span>Mulai</span>
                    </button>
                    <button 
                        onclick="stopTimer(1)" 
                        class="bg-red-500 text-white py-3 rounded-lg hover:bg-red-600 transition-all duration-300 flex items-center justify-center space-x-2"
                    >
                        <i class="fas fa-stop"></i>
                        <span>Berhenti</span>
                    </button>
                </div>

                <button 
                    onclick="saveData(1)" 
                    class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition-all duration-300 mt-4 flex items-center justify-center space-x-2"
                >
                    <i class="fas fa-save"></i>
                    <span>Simpan Data</span>
                </button>
            </div>
        </div>
    </div>
    <!--Card Timer 2-->
<div class="container mx-auto max-w-md">
        <div 
            class="bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden transform transition-all duration-300 hover:scale-[2.02]" 
            data-aos="zoom-in-up"
        >
            <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white p-6 flex items-center justify-between">
                <div>
                    <i class="fas fa-billiard-ball text-3xl mr-4"></i>
                    <span class="text-2xl font-semibold tracking-wide">Billiard Tracker</span>
                </div>
                <div id="current-time" class="text-lg font-light opacity-80"></div>
            </div>
            
            <div class="p-6 space-y-5">
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="bg-blue-50 rounded-xl p-3 text-center">
                        <i class="fas fa-table text-blue-600 text-2xl mb-2"></i>
                        <div id="table-number-display" class="font-bold text-blue-800">Meja 2</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-3 text-center">
                        <i class="fas fa-clock text-green-600 text-2xl mb-2"></i>
                        <div id="timer-display-2" class="font-bold text-green-800">00:00</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-3 text-center">
                        <i class="fas fa-money-bill-wave text-purple-600 text-2xl mb-2"></i>
                        <div id="total-price-2" class="font-bold text-purple-800">Rp 0</div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="relative">
                        <input 
                            type="text" 
                            id="name-2" 
                            placeholder="Nama Pemain" 
                            class="w-full px-4 py-3 pl-20 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                        >
                        <i class="fas fa-user absolute left-3 top-3.5 text-gray-400"></i>
                    </div>

                    <div class="relative">
                        <input 
                            type="number" 
                            id="price-2" 
                            placeholder="Harga per Menit" 
                            class="w-full px-4 py-3 pl-20 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                        >
                        <i class="fas fa-money-bill-wave absolute left-3 top-3.5 text-gray-400"></i>
                    </div>

                    <div class="relative">
                        <input 
                            type="number" 
                            id="table-number-2" 
                            value="2"
                            min="2"
                            max="20"
                            placeholder="Nomor Meja" 
                            class="w-full px-4 py-3 pl-20 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                            oninput="updateTableDisplay(this.value)"
                        >
                        <i class="fas fa-table absolute left-3 top-3.5 text-gray-400"></i>
                    </div>
                </div>

                <div id="output-2" class="w-full px-4 py-3 pl-20 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 text-center text-green-800 text-lg"></div>

                <div class="grid grid-cols-2 gap-4">
                    <button 
                        onclick="startTimer(2)" 
                        class="bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition-all duration-300 flex items-center justify-center space-x-2"
                    >
                        <i class="fas fa-play"></i>
                        <span>Mulai</span>
                    </button>
                    <button 
                        onclick="stopTimer(2)" 
                        class="bg-red-500 text-white py-3 rounded-lg hover:bg-red-600 transition-all duration-300 flex items-center justify-center space-x-2"
                    >
                        <i class="fas fa-stop"></i>
                        <span>Berhenti</span>
                    </button>
                </div>

                <button 
                    onclick="saveData(2)" 
                    class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition-all duration-300 mt-4 flex items-center justify-center space-x-2"
                >
                    <i class="fas fa-save"></i>
                    <span>Simpan Data</span>
                </button>
            </div>
        </div>
    </div>
<!--Card Timer 3-->
<div class="container mx-auto max-w-md">
    <div 
        class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden transform transition-all duration-300 hover:scale-[1.02]" 
        data-aos="zoom-in-up"
    >
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white p-6 flex items-center justify-between">
            <div>
                <i class="fas fa-billiard-ball text-3xl mr-4"></i>
                <span class="text-2xl font-semibold tracking-wide">Billiard Tracker</span>
            </div>
            <div id="current-time" class="text-lg font-light opacity-80"></div>
        </div>
        
        <div class="p-6 space-y-5">
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-blue-50 rounded-xl p-3 text-center">
                    <i class="fas fa-table text-blue-600 text-2xl mb-2"></i>
                    <div id="table-number-display" class="font-bold text-blue-800">Meja 3</div>
                </div>
                <div class="bg-green-50 rounded-xl p-3 text-center">
                    <i class="fas fa-clock text-green-600 text-2xl mb-2"></i>
                    <div id="timer-display-3" class="font-bold text-green-800">00:00</div>
                </div>
                <div class="bg-purple-50 rounded-xl p-3 text-center">
                    <i class="fas fa-money-bill-wave text-purple-600 text-2xl mb-2"></i>
                    <div id="total-price-3" class="font-bold text-purple-800">Rp 0</div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="relative">
                    <input 
                        type="text" 
                        id="name-3" 
                        placeholder="Nama Pemain" 
                        class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                    >
                    <i class="fas fa-user absolute left-3 top-3.5 text-gray-400"></i>
                </div>

                <div class="relative">
                    <input 
                        type="number" 
                        id="price-3" 
                        placeholder="Harga per Menit" 
                        class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                    >
                    <i class="fas fa-money-bill-wave absolute left-3 top-3.5 text-gray-400"></i>
                </div>

                <div class="relative">
                    <input 
                        type="number" 
                        id="table-number-3" 
                        value="3"
                        min="1"
                        max="20"
                        placeholder="Nomor Meja" 
                        class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                        oninput="updateTableDisplay(this.value)"
                    >
                    <i class="fas fa-table absolute left-3 top-3.5 text-gray-400"></i>
                </div>
            </div>

            <div id="output-3" class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 text-center text-green-800 text-lg"></div>

            <div class="grid grid-cols-2 gap-4">
                <button 
                    onclick="startTimer(3)" 
                    class="bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition-all duration-300 flex items-center justify-center space-x-2"
                >
                    <i class="fas fa-play"></i>
                    <span>Mulai</span>
                </button>
                <button 
                    onclick="stopTimer(3)" 
                    class="bg-red-500 text-white py-3 rounded-lg hover:bg-red-600 transition-all duration-300 flex items-center justify-center space-x-2"
                >
                    <i class="fas fa-stop"></i>
                    <span>Berhenti</span>
                </button>
            </div>

            <button 
                onclick="saveData(3)" 
                class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition-all duration-300 mt-4 flex items-center justify-center space-x-2"
            >
                <i class="fas fa-save"></i>
                <span>Simpan Data</span>
            </button>
        </div>
    </div>
</div>

 
</div>
</div>


  <script>
    // Initialize AOS.js (for animation on scroll)
AOS.init();

// Untuk setiap card, kita akan memiliki timer, interval, dan waktu tersendiri
let timers = {};  // Menyimpan waktu per card
let intervals = {};  // Menyimpan interval per card

// Fungsi untuk memperbarui tampilan timer setiap detik
function updateDisplay(cardId) {
    const display = document.getElementById(`timer-display-${cardId}`);
    const hours = Math.floor(timers[cardId] / 3600);
    const minutes = Math.floor((timers[cardId] % 3600) / 60);
    const seconds = timers[cardId] % 60;

    display.textContent = `${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
}

// Fungsi untuk memulai timer
function startTimer(cardId) {
    // Cek apakah sudah ada interval yang berjalan untuk card tersebut
    if (intervals[cardId]) clearInterval(intervals[cardId]);

    // Mulai timer untuk card ini
    intervals[cardId] = setInterval(() => {
        timers[cardId]++;
        localStorage.setItem(`timer-${cardId}`, timers[cardId]); // Simpan timer di localStorage
        updateDisplay(cardId);
        calculateTotalPrice(cardId); // Perbarui total harga setiap detik
    }, 1000);
}

// Fungsi untuk menghentikan timer
async function stopTimer(cardId) {
    clearInterval(intervals[cardId]);
    intervals[cardId] = null;

    const name = localStorage.getItem(`name-${cardId}`) || "(Nama tidak tersedia)";
    const price = parseFloat(localStorage.getItem(`price-${cardId}`)) || 0;
    const tableNumber = localStorage.getItem(`tableNumber-${cardId}`) || "(Nomor meja tidak tersedia)";

    const totalHours = Math.floor(timers[cardId] / 3600);
    const totalMinutes = Math.floor((timers[cardId] % 3600) / 60);
    const totalSeconds = timers[cardId] % 60;

    const totalPrice = (timers[cardId] / 60) * price;

    alert(`Timer dihentikan.\nNama: ${name}\nNomor Meja: ${tableNumber}\nTotal Waktu: ${totalHours} Jam ${totalMinutes} Menit ${totalSeconds} Detik\nTotal Harga: Rp ${totalPrice.toFixed(2)}`);

    try {
        const response = await fetch('/save-timer', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                name: name,
                tableNumber: tableNumber,
                totalTimeHours: totalHours,
                totalTimeMinutes: totalMinutes,
                totalTimeSeconds: totalSeconds,
                totalPrice: totalPrice.toFixed(2)
            }),
        });

        const result = await response.json();
        if (response.ok) {
            console.log(result.message);
        } else {
            console.error(result.message);
        }
    } catch (error) {
        console.error('Terjadi kesalahan:', error);
    }

    timers[cardId] = 0;
    updateDisplay(cardId);
    document.getElementById(`output-${cardId}`).textContent = ""; // Hapus output
    document.getElementById(`total-price-${cardId}`).textContent = ""; // Hapus total harga
    document.getElementById(`name-${cardId}`).value = ""; // Hapus nama
    document.getElementById(`price-${cardId}`).value = ""; // Hapus harga
    document.getElementById(`table-number-${cardId}`).value = ""; // Hapus nomor meja

    // Hapus data terkait timer dari localStorage
    localStorage.removeItem(`timer-${cardId}`);
    localStorage.removeItem(`name-${cardId}`);
    localStorage.removeItem(`price-${cardId}`);
    localStorage.removeItem(`tableNumber-${cardId}`);
    localStorage.removeItem(`description-${cardId}`);
}

// Fungsi untuk menyimpan data nama, harga, dan nomor meja
function saveData(cardId) {
    const name = document.getElementById(`name-${cardId}`).value;
    const price = document.getElementById(`price-${cardId}`).value;
    const tableNumber = document.getElementById(`table-number-${cardId}`).value;

    if (name && price && tableNumber) {
        const output = document.getElementById(`output-${cardId}`);
        output.textContent = `Nama: ${name}, Harga: ${price}, Nomor Meja: ${tableNumber}`;
        localStorage.setItem(`name-${cardId}`, name);
        localStorage.setItem(`price-${cardId}`, price);
        localStorage.setItem(`tableNumber-${cardId}`, tableNumber);
        localStorage.setItem(`description-${cardId}`, `Nama: ${name}, Harga: ${price}, Nomor Meja: ${tableNumber}`);

        document.getElementById(`start-timer-${cardId}`).disabled = false; // Enable start button
    } else {
        alert('Mohon isi nama, harga, dan nomor meja.');
    }
}

// Fungsi untuk menghitung total harga
function calculateTotalPrice(cardId) {
    const price = parseFloat(localStorage.getItem(`price-${cardId}`)); // Ambil harga dari localStorage
    if (!isNaN(price) && price > 0) {
        const totalPrice = (timers[cardId] / 60) * price; // Hitung total harga berdasarkan waktu dalam menit

        // Menampilkan total harga di card
        const totalPriceDisplay = document.getElementById(`total-price-${cardId}`);
        totalPriceDisplay.textContent = `Total Harga: Rp ${totalPrice.toFixed(3)}`; // Format harga dengan dua desimal
    }
}

// Fungsi untuk mengembalikan input yang telah disimpan di localStorage
function restoreInput(cardId) {
    const name = localStorage.getItem(`name-${cardId}`);
    const price = localStorage.getItem(`price-${cardId}`);
    const tableNumber = localStorage.getItem(`tableNumber-${cardId}`);
    const description = localStorage.getItem(`description-${cardId}`);

    if (name) document.getElementById(`name-${cardId}`).value = name;
    if (price) document.getElementById(`price-${cardId}`).value = price;
    if (tableNumber) document.getElementById(`table-number-${cardId}`).value = tableNumber;
    if (description) document.getElementById(`output-${cardId}`).textContent = description;
}

// Mengembalikan data saat halaman dimuat
window.onload = function() {
    for (let cardId = 1; cardId <= 9; cardId++) {
        restoreInput(cardId);

        // Ambil timer yang telah disimpan
        timers[cardId] = parseInt(localStorage.getItem(`timer-${cardId}`)) || 0;

        // Jika ada timer yang sudah disimpan, lanjutkan timer tersebut
        if (timers[cardId] > 0) {
            startTimer(cardId);
        }

        // Perbarui tampilan setiap kali halaman dimuat
        updateDisplay(cardId);
        calculateTotalPrice(cardId); // Perbarui total harga saat halaman dimuat
    }
}
  </script>
</body>
</html>

@endsection
