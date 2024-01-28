
<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete Category? </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">

            <!--[if BLOCK]><![endif]--><?php if(session('message')): ?>
                <div class="alert alert-success"><?php echo e(session('message')); ?></div>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="<?php echo e(url('admin/category/create')); ?>" class="btn btn-primary btn-sm float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->id); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->status == '1' ? 'Hidden' : 'Visible'); ?></td>
                                <td>
                                    <a href="<?php echo e(url('admin/category/'.$category->id.'/edit')); ?>" class="btn btn-success">Edit</a>
                                    <a href="#" wire:click="deleteCategory(<?php echo e($category->id); ?>)" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>

                    <div>
                        <?php echo e($categories->links()); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



















<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('close-modal', (event) => {
                $('#deleteModal').model('hide');
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/resources/views/livewire/admin/category/index.blade.php ENDPATH**/ ?>