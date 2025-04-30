

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Dashboard</h1>
        <div>
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary">
                    <i class="fas fa-calendar me-1"></i> Today
                </button>
                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Week</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div>
            <button class="btn btn-primary ms-2">
                <i class="fas fa-download me-1"></i> Generate Report
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">850</div>
                            <div class="text-xs text-success mt-2">
                                <i class="fas fa-arrow-up me-1"></i>12.5% since last month
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Revenue</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            <div class="text-xs text-success mt-2">
                                <i class="fas fa-arrow-up me-1"></i>8.3% since last month
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                New Orders
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">124</div>
                            <div class="text-xs text-danger mt-2">
                                <i class="fas fa-arrow-down me-1"></i>3.2% since last month
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Tasks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            <div class="text-xs text-success mt-2">
                                <i class="fas fa-arrow-up me-1"></i>5.7% since last month
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Revenue Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">View Details</a>
                            <a class="dropdown-item" href="#">Export Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                            <p class="text-center text-muted">
                                <i class="fas fa-chart-line fa-3x mb-3 d-block"></i>
                                Chart will be displayed here.<br>
                                In a real application, you would use Chart.js or similar library.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink2">
                            <a class="dropdown-item" href="#">View Details</a>
                            <a class="dropdown-item" href="#">Export Data</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-pie">
                        <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                            <p class="text-center text-muted">
                                <i class="fas fa-chart-pie fa-3x mb-3 d-block"></i>
                                Pie chart will be displayed here.<br>
                                In a real application, you would use Chart.js or similar library.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities & Tasks -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold">Recent Activities</h6>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">New user registered</h6>
                                <small>3 mins ago</small>
                            </div>
                            <p class="mb-1">John Doe has registered a new account.</p>
                            <small class="text-muted">IP: 192.168.1.1</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Product updated</h6>
                                <small>1 hour ago</small>
                            </div>
                            <p class="mb-1">Product #1234 stock has been updated.</p>
                            <small class="text-muted">Updated by: Admin</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">New order received</h6>
                                <small>2 hours ago</small>
                            </div>
                            <p class="mb-1">Order #5678 has been placed.</p>
                            <small class="text-muted">Customer: Jane Smith</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">System alert</h6>
                                <small>5 hours ago</small>
                            </div>
                            <p class="mb-1">Disk space running low.</p>
                            <small class="text-muted">Server: Web-01</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold">Tasks</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="task1">
                            <label class="form-check-label" for="task1">
                                Update server packages
                            </label>
                        </div>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="task2">
                            <label class="form-check-label" for="task2">
                                Review new orders
                            </label>
                        </div>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="task3">
                            <label class="form-check-label" for="task3">
                                Respond to support tickets
                            </label>
                        </div>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="task4">
                            <label class="form-check-label" for="task4">
                                Prepare monthly report
                            </label>
                        </div>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="task5">
                            <label class="form-check-label" for="task5">
                                Schedule backup routine
                            </label>
                        </div>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .border-left-primary {
        border-left: 4px solid #4e73df;
    }
    .border-left-success {
        border-left: 4px solid #1cc88a;
    }
    .border-left-info {
        border-left: 4px solid #36b9cc;
    }
    .border-left-warning {
        border-left: 4px solid #f6c23e;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        // Initialize any plugins or add custom functionality for dashboard
        
        // In a real application, you would initialize charts here
        // Example: 
        // var ctx = document.getElementById('revenueChart').getContext('2d');
        // var myChart = new Chart(ctx, { ... });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\inventory-management-system\resources\views/dashboard.blade.php ENDPATH**/ ?>