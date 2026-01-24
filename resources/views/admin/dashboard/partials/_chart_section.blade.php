<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h4 class="font-bold text-gray-800 text-lg flex items-center gap-2">
                <i class="fas fa-chart-area text-indigo-500"></i> Statistik Pendaftar
            </h4>
            <p class="text-xs text-gray-500 mt-1">Tren pendaftaran peserta magang per bulan.</p>
        </div>

        <select class="text-xs border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50">
            <option>Tahun {{ date('Y') }}</option>
        </select>
    </div>

    <div class="relative h-72 w-full">
        <canvas id="registrationChart"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('registrationChart').getContext('2d');

        // Buat Gradient untuk area bawah garis
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(79, 70, 229, 0.2)'); // Indigo pudar atas
        gradient.addColorStop(1, 'rgba(79, 70, 229, 0)'); // Transparan bawah

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chart_labels),
                datasets: [{
                    label: 'Pendaftar Baru',
                    data: @json($chart_data),
                    borderColor: '#4F46E5', // Warna Garis (Indigo 600)
                    backgroundColor: gradient, // Warna Area (Gradient)
                    borderWidth: 3,
                    tension: 0.4, // Kelengkungan garis (biar smooth)
                    fill: true,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#4F46E5',
                    pointBorderWidth: 2,
                    pointRadius: 6, // Titik lebih besar
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // PENTING: Agar chart ngikutin tinggi container h-72
                plugins: {
                    legend: {
                        display: false
                    }, // Sembunyikan legenda (opsional, biar bersih)
                    tooltip: {
                        backgroundColor: '#1f2937',
                        padding: 12,
                        titleFont: {
                            size: 13
                        },
                        bodyFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [2, 4], // Garis putus-putus tipis
                            color: '#e5e7eb',
                            drawBorder: false,
                        },
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 11
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }, // Hilangkan grid vertikal
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
            }
        });
    });
</script>
