<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#0d6efd',
                        'primary-hover': '#0b5ed7',
                        'secondary': '#6c757d',
                        'success': '#198754',
                        'danger': '#dc3545',
                        'warning': '#ffc107',
                        'info': '#0dcaf0',
                        'light': '#f8f9fa',
                        'dark': '#343a40',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex">
        <!-- Sidebar Navigation -->
        <div class="w-64 h-screen fixed bg-dark text-white py-5">
            <div class="text-center mb-6">
                <h4 class="text-xl font-semibold">Inventory System</h4>
            </div>
            <ul class="space-y-1 px-3">
                <li>
                    <a href="/home" class="flex items-center px-4 py-3 rounded-md hover:bg-gray-600 transition-colors text-gray-300 hover:text-white {{ request()->is('home') ? 'bg-primary text-white' : '' }}">
                        <i class="fas fa-home mr-3"></i> Home
                    </a>
                </li>
                <li>
                    <a href="/history" class="flex items-center px-4 py-3 rounded-md hover:bg-gray-600 transition-colors text-gray-300 hover:text-white {{ request()->is('history') ? 'bg-primary text-white' : '' }}">
                        <i class="fas fa-history mr-3"></i> History
                    </a>
                </li>
                <!-- <li>
                    <a href="/reports" class="flex items-center px-4 py-3 rounded-md hover:bg-gray-600 transition-colors text-gray-300 hover:text-white">
                        <i class="fas fa-chart-bar mr-3"></i> Reports
                    </a>
                </li>
                <li>
                    <a href="/settings" class="flex items-center px-4 py-3 rounded-md hover:bg-gray-600 transition-colors text-gray-300 hover:text-white">
                        <i class="fas fa-cog mr-3"></i> Settings
                    </a>
                </li> -->
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="ml-64 w-full p-6">
            @yield('content')
        </div>
    </div>

    <!-- Alpine.js for interactivity (as a lightweight alternative to Bootstrap JS) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
