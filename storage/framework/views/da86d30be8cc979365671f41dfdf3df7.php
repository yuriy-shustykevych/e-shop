<?php $__env->startSection('content'); ?>

    <div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.category.index', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-724082735-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/category/index.blade.php ENDPATH**/ ?>