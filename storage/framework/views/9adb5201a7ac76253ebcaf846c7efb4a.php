<?php $__env->startSection('title', 'My Orders'); ?>

<?php $__env->startSection('content'); ?>

   <div class="py-3 py-md-5">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders</h4>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Ordered Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($order->id); ?></td>
                                            <td><?php echo e($order->created_at->format('d-m-Y')); ?></td>
                                            <td><?php echo e($order->status); ?></td>
                                            <td><a href="<?php echo e(url('orders/'.$order->id)); ?>}" class="btn btn-primary btn-sm ">View</a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7">No Orders Available</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div>
                                <?php echo e($orders->links()); ?>

                            </div>
                        </div>
                    </div>
               </div>
           </div>
       </div>
   </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/frontend/orders/index.blade.php ENDPATH**/ ?>