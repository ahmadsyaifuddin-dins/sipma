<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 h-full flex flex-col">
    <h4 class="font-bold text-gray-700 mb-4 flex items-center gap-2">
        <i class="fas fa-chart-pie text-indigo-500"></i> Statistik Kehadiran
    </h4>

    <div class="relative flex-grow flex items-center justify-center">
        <canvas id="attendanceChart" style="max-height: 200px;"></canvas>
    </div>

    <div class="mt-4 grid grid-cols-2 gap-2 text-xs">
        <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-green-500"></span> Hadir:
            {{ $hadir }}</div>
        <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-blue-500"></span> Izin:
            {{ $izin }}</div>
        <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-yellow-500"></span> Sakit:
            {{ $sakit }}</div>
        <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-red-500"></span> Alpha:
            {{ $alpha }}</div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Hadir', 'Izin', 'Sakit', 'Alpha'],
                datasets: [{
                    data: [{{ $hadir }}, {{ $izin }}, {{ $sakit }},
                        {{ $alpha }}
                    ],
                    backgroundColor: ['#10B981', '#3B82F6', '#F59E0B', '#EF4444'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    } // Kita pakai legend custom di bawah
                }
            }
        });
    });
</script>
