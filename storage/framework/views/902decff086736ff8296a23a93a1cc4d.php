<nav id="sidebar">
    <div class="sidebar-header">
        <h5><?php echo e(config('app.name', 'Laravel')); ?></h5>
    </div>

    <ul class="list-unstyled components">
        <li class="<?php echo e(request()->is('dashboard') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
        
        <li class="<?php echo e(request()->is('users*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('users.index')); ?>">
                <i class="fas fa-users me-2"></i> Users
            </a>
        </li>
        
        <li class="<?php echo e(request()->is('products*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('products.index')); ?>">
                <i class="fas fa-box me-2"></i> Products
            </a>
        </li>
        
        <li class="<?php echo e(request()->is('orders*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('orders.index')); ?>">
                <i class="fas fa-shopping-cart me-2"></i> Orders
            </a>
        </li>
        
        <li class="<?php echo e(request()->is('reports*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('reports.index')); ?>">
                <i class="fas fa-chart-bar me-2"></i> Reports
            </a>
        </li>
        
        <li class="<?php echo e(request()->is('settings*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('settings.index')); ?>">
                <i class="fas fa-cog me-2"></i> Settings
            </a>
        </li>
    </ul>

    <div class="px-3 py-2 mt-auto">
        <div class="text-muted small">
            <div>Version: 1.0.0</div>
            <div>&copy; <?php echo e(date('Y')); ?> Your Company</div>
        </div>
    </div>
</nav><?php /**PATH C:\laragon\www\inventory-management-system\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>