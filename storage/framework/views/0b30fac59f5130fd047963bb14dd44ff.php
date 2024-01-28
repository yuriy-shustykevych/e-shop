<?php $__env->startSection('title', 'Thank You for Shopping'); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="p-4 shadow bg-white">
                        <h2>ITStep</h2>
                        <h4>
                            Thank You for Shopping
                        </h4>
                        <a href="<?php echo e(url('collections')); ?>" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/frontend/thank-you.blade.php ENDPATH**/ ?>