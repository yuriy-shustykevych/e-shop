<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <!--[if BLOCK]><![endif]--><?php if($product->productImages): ?>
                            <img src="<?php echo e(asset($product->productImages[0]->image)); ?>" class="w-100" alt="Img">
                        <?php else: ?>
                            No Image Added
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            <?php echo e($product->name); ?>

                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / <?php echo e($product->category->name); ?> / <?php echo e($product->name); ?>

                        </p>
                        <div>
                            <span class="selling-price">$<?php echo e($product->selling_price); ?></span>
                            <span class="original-price">$<?php echo e($product->original_price); ?></span>
                        </div>
                        <div>
                            <!--[if BLOCK]><![endif]--><?php if($product->quantity): ?>
                                <label class="btn btn-sm py-1 mt-1 text-white bg-success">In Stock</label>
                            <?php else: ?>
                                <label class="btn btn-sm py-1 mt-1 text-white bg-danger">Out of Stock</label>
                            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="<?php echo e($this->quantityCount); ?>" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart(<?php echo e($product->id); ?>)" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>

                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                <?php echo $product->small_description; ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php echo $product->description; ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/livewire/frontend/product/view.blade.php ENDPATH**/ ?>