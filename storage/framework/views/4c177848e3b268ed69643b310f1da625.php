<?php $__env->startSection('title', 'Order Details'); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary"><i class="fa fa-shopping-cart text-dark"></i> Order Details
                            <a href="<?php echo e(url( 'orders')); ?>" class="btn btn-danger btn-sm float-end">BACK</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Order Details</h5>
                                <hr>

                                <h6>Order Id: <?php echo e($order->id); ?></h6>
                                <h6>Order Created Date: <?php echo e($order->created_at->format('d-m-Y h:i A')); ?></h6>
                                <h6 class="border p-2 text-success">Order Status: <span class="text-uppercase"><?php echo e($order->status); ?></span></h6>
                            </div>
                        </div>

                        <br/>
                        <h4 class="mb-4">My Orders</h4>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Item Id</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $totalPrice = 0
                                ?>
                                <?php $__empty_1 = true; $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                     <tr>
                                        <td width="10%"><?php echo e($orderItem->id); ?></td>
                                        <td width="10%">
                                            <?php if($orderItem->product && $orderItem->product->productImages): ?>
                                                <img src="<?php echo e(asset($orderItem->product->productImages[0]->image)); ?>" style="width: 50px; height: 50px" alt="<?php echo e($orderItem->product->name); ?>">
                                            <?php else: ?>
                                                <img src="" style="width: 50px; height: 50px" alt="<?php echo e($orderItem->product->name); ?>">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e($orderItem->product->name); ?>

                                        </td>
                                         <td width="10%">$<?php echo e($orderItem->price); ?></td>
                                         <td width="10%"><?php echo e($orderItem->quantity); ?></td>
                                         <td width="10%" class="fw-bold">$<?php echo e($orderItem->quantity * $orderItem->price); ?></td>
                                         <?php
                                             $totalPrice += $orderItem->quantity * $orderItem->price
                                         ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6">No Orders Available</td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount:</td>
                                    <td colspan="5" class="fw-bold">$<?php echo e($totalPrice); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/frontend/orders/view.blade.php ENDPATH**/ ?>