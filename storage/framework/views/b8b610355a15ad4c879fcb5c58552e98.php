<?php $__env->startSection('title', 'OMDb Api'); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('omdbapi.index', ['responseData' => $responseData,'pageNumber' => $pageNumber,'title' => $title]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3405538723-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/omdbapi/index.blade.php ENDPATH**/ ?>