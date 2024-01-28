<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/base/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/style.css')); ?>">
    <!-- endinject -->


    <!-- Scripts -->


    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body>

<div class="container-scroller">
    <?php echo $__env->make('layouts.inc.admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid page-body-wrapper">
        <?php echo $__env->make('layouts.inc.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main-panel">
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('admin/vendors/base/vendor.bundle.base.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendors/datatables.net/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')); ?>"></script>

<script src="<?php echo e(asset('admin/js/off-canvas.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/hoverable-collapse.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/template.js')); ?>"></script>

<!-- Custom js for this page-->
<script src="<?php echo e(asset('admin/js/dashboard.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/data-table.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/dataTables.bootstrap4.js')); ?>"></script>
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

<?php echo $__env->yieldPushContent('script'); ?>
</body>
</html>
<?php /**PATH /var/www/resources/views/layouts/admin.blade.php ENDPATH**/ ?>