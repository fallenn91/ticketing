<div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-3">
    <!-- Usuarios -->
    <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 ease-in-out">
        <h3 class="text-negro font-bold text-lg">Usuarios</h3>
        <p class="text-verde text-2xl mt-2"><?php echo e($usuarios); ?></p>
        <canvas id="chart-usuarios" class="mt-4 h-16 w-full"></canvas>
    </div>

    <!-- Portfolios -->
    <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 ease-in-out">
        <h3 class="text-negro font-bold text-lg">Portfolios</h3>
        <p class="text-verde text-2xl mt-2"><?php echo e($portfolios); ?></p>
        <canvas id="chart-portfolios" class="mt-4 h-16 w-full"></canvas>
    </div>

    <!-- Transacciones -->
    <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 ease-in-out">
        <h3 class="text-negro font-bold text-lg">Transacciones</h3>
        <p class="text-verde text-2xl mt-2"><?php echo e($transacciones); ?></p>
        <canvas id="chart-transacciones" class="mt-4 h-16 w-full"></canvas>
    </div>

    <!-- Ofertas -->
    <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 ease-in-out">
        <h3 class="text-negro font-bold text-lg">Ofertas</h3>
        <p class="text-verde text-2xl mt-2"><?php echo e($ofertas); ?></p>
        <canvas id="chart-ofertas" class="mt-4 h-16 w-full"></canvas>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const initChart = (id, data, color) => {
        new Chart(document.getElementById(id), {
            type: 'line',
            data: {
                labels: ['Ene','Feb','Mar','Abr'],
                datasets: [{
                    data: data,
                    fill: true,
                    backgroundColor: color + '33',
                    borderColor: color,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { x: { display: false }, y: { display: false } }
            }
        });
    };

    initChart('chart-usuarios', [5, 8, 12, <?php echo e($usuarios); ?>], '#CDE953');
    initChart('chart-portfolios', [10, 15, 20, <?php echo e($portfolios); ?>], '#CDE953');
    initChart('chart-transacciones', [3, 6, 9, <?php echo e($transacciones); ?>], '#CDE953');
    initChart('chart-ofertas', [2, 4, 6, <?php echo e($ofertas); ?>], '#CDE953');
</script><?php /**PATH /var/www/html/resources/views/livewire/diabolo/assets/dashboard-cards.blade.php ENDPATH**/ ?>