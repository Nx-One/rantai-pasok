

<?php $__env->startSection('title', 'Persediaan'); ?>
<?php $__env->startSection('pageName', 'Persediaan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <form>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Durian Tersedia</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"/>
                        <span class="input-group-text">pack</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Durian Diterima</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"/>
                        <span class="input-group-text">pack</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Dikirim</label>
                    <input type="date" class="form-control"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Diterima</label>
                    <input type="date" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Biaya Penyimpanan</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Biaya Pemesanan</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Permintaan</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"/>
                        <span class="input-group-text">Pack</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Hitung EOQ</button>
                </div>
            </div>
        </div>
        
    </form>    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ngoding\laravel\rantai-pasok\resources\views/persediaan/index.blade.php ENDPATH**/ ?>