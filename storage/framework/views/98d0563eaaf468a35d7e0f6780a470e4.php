<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <?php if(session('message')): ?>
                <div class="alert alert-success"><?php echo e(session('message')); ?></div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="<?php echo e(url('admin/products/create')); ?>" class="btn btn-primary btn-sm text-white float-end">Add Products</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>
                                    <td>
                                        <?php if($product->category): ?>
                                            <?php echo e($product->category->name); ?>

                                        <?php else: ?>
                                            No Category
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($product->name); ?></td>
                                    <td><?php echo e($product->selling_price); ?></td>
                                    <td><?php echo e($product->quantity); ?></td>
                                    <td><?php echo e($product->status == '1' ? 'Hidden' : "Visible"); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('admin/products/'.$product->id.'/edit')); ?>" class="btn btn-sm btn-success">Edit</a>
                                        <a href="<?php echo e(url('admin/products/'.$product->id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7">No Products Available</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/products/index.blade.php ENDPATH**/ ?>