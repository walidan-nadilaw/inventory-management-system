<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
        }
        
        #sidebar.active {
            margin-left: -250px;
        }
        
        #sidebar .sidebar-header {
            padding: 20px;
            background: #212529;
        }
        
        #sidebar ul li a {
            padding: 10px 15px;
            display: block;
            color: #fff;
            text-decoration: none;
        }
        
        #sidebar ul li a:hover {
            background: #495057;
        }
        
        #sidebar ul li.active > a {
            background: #0d6efd;
            color: #fff;
        }
        
        #content {
            width: 100%;
            min-height: 100vh;
            transition: all 0.3s;
        }
        
        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .table-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php echo $__env->make('layouts.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        
        <!-- Page Content -->
        <div id="content">
            <?php echo $__env->make('layouts.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            
            <main class="py-4 px-4">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\laragon\www\inventory-management-system\resources\views/layouts/master.blade.php ENDPATH**/ ?>