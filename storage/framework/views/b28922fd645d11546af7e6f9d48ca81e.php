<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Product
                        <a href="<?php echo e(url('admin/products')); ?>" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-warning">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div><?php echo e($error); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(url('admin/products')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-panel" href="#" role="tab" aria-controls="home-tab" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-panel" href="#" role="tab" aria-controls="seotag-tab" aria-selected="false">SEO Tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-panel" href="#" role="tab" aria-controls="details-tab" aria-selected="false">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-panel" href="#" role="tab" aria-controls="image-tab" aria-selected="false">Product Image</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane border p-3 fade show active" id="home-tab-panel" role="tabpanel" aria-labelledby="home-tab">
                                <div class="col-md-6 mb-3">
                                    <label>Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Brand</label>
                                    <input type="text" name="brand" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Small Description (500 Words)</label>
                                    <input type="text" name="small_description" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control"/>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="seotag-tab-panel" role="tabpanel" aria-labelledby="seotag-tab">
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Mate Keyword</label>
                                    <input type="text" name="meta_keyword" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control"/>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="details-tab-panel" role="tabpanel" aria-labelledby="details-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Original Price</label>
                                            <input type="number" name="original_price" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling Price</label>
                                            <input type="number" name="selling_price" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending" style="width: 20px; height: 20px;"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label>Status</label>
                                            <input type="checkbox" name="status" style="width: 20px; height: 20px;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="image-tab-panel" role="tabpanel" aria-labelledby="image-tab">
                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" multiple name="image[]" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/products/create.blade.php ENDPATH**/ ?>