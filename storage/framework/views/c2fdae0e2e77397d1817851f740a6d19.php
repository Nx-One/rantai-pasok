

<?php $__env->startSection('title', 'Mitigasi Risiko'); ?>
<?php $__env->startSection('pageName', 'Mitigasi Risiko'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h5 class="fw-semibold">Daftar Mitigasi</h5>
            <a href="<?php echo e(route('hor1Mitigasi')); ?>" class="btn btn-yellow-custom mt-3">Tambah Mitigasi</a>
        </div>
    </div>
    <table class="my-4 table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $mitigationRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mitigasiRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($mitigasiRecord->name); ?></td>
                <td><?php echo e($mitigasiRecord->updated_at); ?></td>
                <td>
                    <a href="<?php echo e(route('mitigasi.edit', $mitigasiRecord->id)); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo e(route('mitigasi.show', $mitigasiRecord->id)); ?>" class="btn btn-secondary">Show</a>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ngoding\laravel\rantai-pasok\resources\views/mitigasi/index.blade.php ENDPATH**/ ?>