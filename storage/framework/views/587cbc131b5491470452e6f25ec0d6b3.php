<div>
    <div class="row">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        <?php if($productItem->quantity > 0): ?>
                            <label class="stock bg-success">In Stock</label>
                        <?php else: ?>
                            <label class="stock bg-danger">Out of Stock</label>
                        <?php endif; ?>
                        <?php if($productItem->productImages->count() > 0): ?>
                            <a href="<?php echo e(url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)); ?>">
                                <img src="<?php echo e(asset( $productItem->productImages[0]->image)); ?>" alt="<?php echo e($productItem->name); ?>">
                            </a>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                    </div>
                    <div class="product-card-body">
                        <p class="product-brand"><?php echo e($productItem->brand); ?></p>
                        <h5 class="product-name">
                            <a href="<?php echo e(url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)); ?>">
                                <?php echo e($productItem->name); ?>

                            </a>
                        </h5>
                        <div>
                            <span class="selling-price"><?php echo e($productItem->selling_price); ?></span>
                            <span class="original-price"><?php echo e($productItem->original_price); ?></span>
                        </div>
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Products Available for <?php echo e($category->name); ?></h4>
                </div>
            </div>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

    </div>
</div>
<?php /**PATH /var/www/resources/views/livewire/frontend/product/index.blade.php ENDPATH**/ ?>