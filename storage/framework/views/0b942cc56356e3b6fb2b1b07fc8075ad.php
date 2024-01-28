<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('admin/category/create')); ?>">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('admin/category')); ?>">View Categories</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#product">
                <i class="mdi mdi-plus-circle menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('admin/products/create')); ?>">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('admin/products')); ?>">View Products</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('admin/orders')); ?>">
                <i class="mdi mdi-currency-btc menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
    </ul>
</nav>
<?php /**PATH /var/www/resources/views/layouts/inc/admin/sidebar.blade.php ENDPATH**/ ?>