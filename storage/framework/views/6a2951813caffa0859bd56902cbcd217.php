<?php $__env->startSection('title'); ?>
    <?php echo e($product->meta_title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keyword'); ?>
    <?php echo e($product->meta_keyword); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
    <?php echo e($product->meta_description); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('frontend.product.view', ['product' => $product,'category' => $category]);

$__html = app('livewire')->mount($__name, $__params, 'lw-96839748-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/frontend/collections/products/view.blade.php ENDPATH**/ ?>