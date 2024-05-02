<?php $__env->startSection('title', 'Penurunan Mutu'); ?>
<?php $__env->startSection('pageName', 'Penurunan Mutu'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <form action="">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="fw-bold" for="tanggal">Masukkan Bulan Produksi Durian </label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-yellow-custom mt-4">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="row my-4">
        <canvas id="myChart"></canvas>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById("myChart");
    
        new Chart(ctx, {
            type: "line",
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ngoding\laravel\rantai-pasok\resources\views/mutu/index.blade.php ENDPATH**/ ?>