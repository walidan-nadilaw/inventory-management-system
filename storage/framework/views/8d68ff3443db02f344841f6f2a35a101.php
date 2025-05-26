
<?php $__env->startSection('content'); ?>

    <?php if(session('add')): ?>
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
            <?php echo e(session('add')); ?>

        </div>
    <?php elseif(session('delete')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?php echo e(session('delete')); ?>

        </div>
    <?php elseif(session('update')): ?>
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
            <?php echo e(session('update')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <h2 class="text-xl font-semibold mb-3">Selamat Datang di Inventory Management System</h2>
        <p class="text-gray-600">Kelola inventaris Anda dengan mudah dan efisien. Gunakan sistem ini untuk melacak stok, memantau pergerakan barang, dan mengoptimalkan proses inventory Anda.</p>
    </div>
    
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">Daftar Inventory</h3>
            <a href="<?php echo e(route('inventory.create')); ?>" class="bg-primary hover:bg-primary-hover text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Item Baru
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="px-4 py-3 rounded-tl-lg">ID</th>
                        <th class="px-4 py-3">Nama Produk</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Harga</th>
                        <th class="px-4 py-3">Terakhir Diperbarui</th>
                        <th class="px-4 py-3 rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-4 py-3"><?php echo e($item['id']); ?></td>
                        <td class="px-4 py-3"><?php echo e($item['item']); ?></td>
                        <td class="px-4 py-3"><?php echo e($item['category']); ?></td>
                        <td class="px-4 py-3"><?php echo e($item['quantity']); ?></td>
                        <td class="px-4 py-3">Rp <?php echo e(number_format($item['price'], 0, ',', '.')); ?></td>
                        <td class="px-4 py-3"><?php echo e($item['updated_at']->format('Y-m-d H:i')); ?></td>                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <a href="<?php echo e(route('inventory.edit', $item['id'])); ?>" class="bg-warning hover:bg-amber-500 text-white px-3 py-1 rounded flex items-center">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <button type="button" 
                                        class="bg-danger hover:bg-red-600 text-white px-3 py-1 rounded flex items-center"
                                        x-data="{}"
                                        @click="$dispatch('open-modal', {id: <?php echo e($item['id']); ?>})">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">Tidak ada data inventory yang tersedia</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<!-- Delete Confirmation Modal -->
<div x-data="{ showDeleteModal: false, itemId: null }"
     x-show="showDeleteModal" 
     @open-delete-modal.window="showDeleteModal = true; itemId = $event.detail.id"
     @keydown.escape.window="showDeleteModal = false"
     class="fixed inset-0 z-50 overflow-y-auto" 
     style="display: none;">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 text-center sm:block sm:p-0">
        <div x-show="showDeleteModal" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="ease-in duration-200" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0" 
             class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div x-show="showDeleteModal" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
             x-transition:leave="ease-in duration-200" 
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
             class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi Hapus</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak dapat dibatalkan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form x-bind:id="'deleteForm' + itemId" x-bind:action="'/items/' + itemId" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-danger text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Hapus
                    </button>
                    <button type="button" @click="showDeleteModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Custom validation messages for Add Modal
        const hargaInput = document.getElementById('harga');
        const jumlahInput = document.getElementById('jumlah');
        
        if (hargaInput) {
            hargaInput.addEventListener('input', function() {
                if (this.value < 0) {
                    this.setCustomValidity('Harga tidak boleh negatif');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
        
        if (jumlahInput) {
            jumlahInput.addEventListener('input', function() {
                if (this.value < 0) {
                    this.setCustomValidity('Jumlah tidak boleh negatif');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
        
        // For Edit Modal - we need to use Alpine.js events
        document.addEventListener('open-edit-modal', function() {
            setTimeout(() => {
                const editHargaInput = document.getElementById('edit_harga');
                const editJumlahInput = document.getElementById('edit_jumlah');
                
                if (editHargaInput) {
                    editHargaInput.addEventListener('input', function() {
                        if (this.value < 0) {
                            this.setCustomValidity('Harga tidak boleh negatif');
                        } else {
                            this.setCustomValidity('');
                        }
                    });
                }
                
                if (editJumlahInput) {
                    editJumlahInput.addEventListener('input', function() {
                        if (this.value < 0) {
                            this.setCustomValidity('Jumlah tidak boleh negatif');
                        } else {
                            this.setCustomValidity('');
                        }
                    });
                }
            }, 100);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\inventory-management-system\resources\views/home.blade.php ENDPATH**/ ?>