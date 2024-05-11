<?php $__env->startSection('title', 'Persediaan'); ?>
<?php $__env->startSection('pageName', 'Persediaan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <form method="POST" action="<?php echo e(route('storePersediaan')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Durian Tersedia</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="durian_quantity"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Durian Diterima</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="durian_received"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Dikirim</label>
                        <input type="date" class="form-control" name="last_sent_at"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Diterima</label>
                        <input type="date" class="form-control" name="last_received_at"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Penyimpanan</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="store_cost"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Pemesanan</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="order_cost"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Jual</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="demand"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Permintaan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="price"/>
                            <span class="input-group-text">Pack</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-yellow-custom">Hitung EOQ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ngoding\laravel\rantai-pasok\resources\views/persediaan/index.blade.php ENDPATH**/ ?>