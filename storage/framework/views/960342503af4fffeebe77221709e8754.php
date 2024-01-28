<?php $__env->startSection('title'); ?>
    <?php echo e($category->meta_title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keyword'); ?>
    <?php echo e($category->meta_keyword); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
    <?php echo e($category->meta_description); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('frontend.product.index', ['products' => $products,'category' => $category]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4056955700-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/frontend/collections/products/index.blade.php ENDPATH**/ ?>