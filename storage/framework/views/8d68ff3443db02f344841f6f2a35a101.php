
<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
    <p><?php echo e(session('success')); ?></p>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-sm p-6 mb-8">
    <h2 class="text-xl font-semibold mb-3">Selamat Datang di Inventory Management System</h2>
    <p class="text-gray-600">Kelola inventaris Anda dengan mudah dan efisien. Gunakan sistem ini untuk melacak stok, memantau pergerakan barang, dan mengoptimalkan proses inventory Anda.</p>
</div>

<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold">Daftar Inventory</h3>
        <button 
            type="button"
            class="bg-primary hover:bg-primary-hover text-white px-4 py-2 rounded-md flex items-center"
            x-data="{}"
            @click="$dispatch('open-add-modal')">
            <i class="fas fa-plus mr-2"></i> Tambah Item Baru
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-dark text-white">
                <tr>
                    <th class="px-4 py-3 rounded-tl-lg">ID</th>
                    <th class="px-4 py-3">Nama Produk</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3 rounded-tr-lg">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="px-4 py-3"><?php echo e($item->id); ?></td>
                    <td class="px-4 py-3"><?php echo e($item->nama); ?></td>
                    <td class="px-4 py-3"><?php echo e($item->jumlah); ?></td>
                    <td class="px-4 py-3">Rp <?php echo e(number_format($item->harga, 0, ',', '.')); ?></td>
                    <td class="px-4 py-3">
                        <div class="flex space-x-2">
                            <button type="button" 
                                    class="bg-warning hover:bg-amber-500 text-white px-3 py-1 rounded flex items-center"
                                    x-data="{}"
                                    @click="$dispatch('open-edit-modal', {
                                        id: <?php echo e($item->id); ?>,
                                        nama: '<?php echo e($item->nama); ?>',
                                        harga: <?php echo e($item->harga); ?>,
                                        jumlah: <?php echo e($item->jumlah); ?>

                                    })">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </button>
                            <button type="button" 
                                    class="bg-danger hover:bg-red-600 text-white px-3 py-1 rounded flex items-center"
                                    x-data="{}"
                                    @click="$dispatch('open-delete-modal', {id: <?php echo e($item->id); ?>})">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">Tidak ada data inventory yang tersedia</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div x-data="{ showAddModal: false }"
     x-show="showAddModal" 
     @open-add-modal.window="showAddModal = true"
     @keydown.escape.window="showAddModal = false"
     class="fixed inset-0 z-50 overflow-y-auto" 
     style="display: none;">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 text-center sm:block sm:p-0">
        <div x-show="showAddModal" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="ease-in duration-200" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0" 
             class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div x-show="showAddModal" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
             x-transition:leave="ease-in duration-200" 
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
             class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fas fa-plus text-blue-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Tambah Item Baru</h3>
                        <div class="mt-4">
                            <form id="addForm" action="<?php echo e(route('home.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Item</label>
                                    <input type="text" name="nama" id="nama" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                                    <input type="number" name="harga" id="harga" min="0" step="any" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah" min="0" step="1" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" form="addForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                    Tambah
                </button>
                <button type="button" @click="showAddModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div x-data="{ showEditModal: false, itemId: null, itemNama: '', itemHarga: 0, itemJumlah: 0 }"
     x-show="showEditModal" 
     @open-edit-modal.window="showEditModal = true; itemId = $event.detail.id; itemNama = $event.detail.nama; itemHarga = $event.detail.harga; itemJumlah = $event.detail.jumlah"
     @keydown.escape.window="showEditModal = false"
     class="fixed inset-0 z-50 overflow-y-auto" 
     style="display: none;">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 text-center sm:block sm:p-0">
        <div x-show="showEditModal" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="ease-in duration-200" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0" 
             class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div x-show="showEditModal" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
             x-transition:leave="ease-in duration-200" 
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
             class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fas fa-edit text-blue-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Item</h3>
                        <div class="mt-4">
                            <form x-bind:id="'editForm' + itemId" x-bind:action="'/items/' + itemId" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="mb-3">
                                    <label for="edit_nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Item</label>
                                    <input type="text" name="nama" id="edit_nama" x-model="itemNama" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                                    <input type="number" name="harga" id="edit_harga" min="0" step="any" x-model="itemHarga" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                                    <input type="number" name="jumlah" id="edit_jumlah" min="0" step="1" x-model="itemJumlah" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" x-bind:form="'editForm' + itemId" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                    Simpan Perubahan
                </button>
                <button type="button" @click="showEditModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
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