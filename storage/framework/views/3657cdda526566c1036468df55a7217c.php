<?php $__env->startSection('title', 'Kinerja Rantai Pasok'); ?>
<?php $__env->startSection('pageName', 'Kinerja Rantai Pasok'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <img src="<?php echo e(asset('img/metrik-rantai.png')); ?>" alt="" width="800px">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-6" style="background-color: #D9D9D9">
            <p>
                Berikut merupakan metrik kinerja rantai pasok berdasarkan model Supply Chain Operations Reference (SCOR) yang disesuaikan dengan kondisi perusahaan serta nilai bobot berdasarkan hasil penilaian pakar praktisi.
            </p>
            <p>
                Nilai bobot menunjukkan tingkat kepentingan dari setiap elemen rantai pasok.
            </p>
        </div>
        <div class="col-6 d-flex align-items-end">
            <a href="<?php echo e(route('formRantai')); ?>" class="btn btn-yellow-custom" style="font-size: 25px">
                <i class="fa-solid fa-chart-line"></i>
                Ukur Nilai Kinerja Rantai Pasok
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ngoding\laravel\rantai-pasok\resources\views/rantai/index.blade.php ENDPATH**/ ?>