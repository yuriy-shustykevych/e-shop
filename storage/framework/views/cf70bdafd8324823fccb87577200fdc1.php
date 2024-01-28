<?php $__env->startSection('title', 'All Categories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="<?php echo e(url( '/collections/'.$categoryItem->slug)); ?>">
                                <div class="category-card-img">
                                    <img src="<?php echo e(asset(''.$categoryItem->image)); ?>" class="w-100" alt="Laptop">
                                </div>
                                <div class="category-card-body">
                                    <h5><?php echo e($categoryItem->name); ?></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-md-12">
                        <h5>No Categories Available</h5>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/frontend/collections/category/index.blade.php ENDPATH**/ ?>