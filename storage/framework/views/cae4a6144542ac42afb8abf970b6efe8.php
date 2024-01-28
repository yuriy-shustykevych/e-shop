<?php $__env->startSection('title', 'User Profile'); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>User Profile</h4>
                    <div class="underline md-4"></div>
                </div>

                <div class="col-md-10">

                    <?php if(session('message')): ?>
                        <p class="alert alert-success"><?php echo e(session('message')); ?></p>
                    <?php endif; ?>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-warning">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div><?php echo e($error); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                    <div class="card-shadow">
                        <div class="card-body">
                            <form action="<?php echo e(url('profile')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-3">
                                            <label>Username</label>
                                            <input type="text" name="name" value="<?php echo e(Auth::user()->name); ?>" class="form-control" />
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="md-3">
                                            <label>Email Address</label>
                                            <input type="text" readonly value="<?php echo e(Auth::user()->email); ?>" name="email" class="form-control" />
                                        </div>
                                        </div>
                                            <div class="col-md-12">
                                        <div class="md-3">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" rows="4"><?php echo e(Auth::user()->userDetail->address ?? ""); ?></textarea>
                                        </div>
                                            </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary">Save Data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/frontend/users/profile.blade.php ENDPATH**/ ?>