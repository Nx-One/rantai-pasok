<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-warehouse" style="font-size: 200px"></i>
                    <h1>Persediaan</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-vial" style="font-size: 200px"></i>
                    <h1>Penurunan Mutu</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-chart-line" style="font-size: 200px"></i>
                    <h1>Kinerja Rantai Pasok</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-triangle-exclamation" style="font-size: 200px"></i>
                    <h1>Mitigasi Risiko</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ngoding\laravel\rantai-pasok\resources\views/home.blade.php ENDPATH**/ ?>