<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="sidebar-logo m-auto">
                    
                    <a href="<?php echo e(route('home')); ?>"><h2 class="m-0 mt-3 text-dark fw-bolder" style="font-family: Montserrat;">LMU-DSS</h2></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="<?php echo e(route('home')); ?>" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#persediaan" aria-expanded="false" aria-controls="persediaan">
                        <i class="fa-solid fa-warehouse"></i>
                        <span>Persediaan</span>
                    </a>
                    <ul id="persediaan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('persediaan')); ?>" class="sidebar-link">Form Persediaan</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('historyPersediaan')); ?>" class="sidebar-link">Riwayat Persediaan</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo e(route('mutu.index')); ?>" class="sidebar-link">
                        <i class="fa-solid fa-vial"></i>
                        <span>Penurunan Mutu</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#kinerja" aria-expanded="false" aria-controls="kinerja">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Kinerja Rantai Pasok</span>
                    </a>
                    <ul id="kinerja" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('rantai')); ?>" class="sidebar-link">Form Kinerja Rantai Pasok</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('historyRantai')); ?>" class="sidebar-link">Riwayat Kinerja Rantai Pasok</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo e(route('mitigasi.index')); ?>" class="sidebar-link">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span>Mitigasi Risiko</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a class="sidebar-link" href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand-md">
                <div class="container">
            
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <h2 style="font-weight: bold">
                                    <?php echo $__env->yieldContent('pageName'); ?>
                                </h2>
                            </li>
                        </ul>
            
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <h4>
                                    Hi, <?php echo e(Auth::user()->name); ?>

                                </h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <script src="<?php echo e(asset('js/vendor/jquery-3.6.3.min.js')); ?>"></script>
    <script src="https://kit.fontawesome.com/c621075835.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\Ngoding\laravel\rantai-pasok\resources\views/layouts/base.blade.php ENDPATH**/ ?>