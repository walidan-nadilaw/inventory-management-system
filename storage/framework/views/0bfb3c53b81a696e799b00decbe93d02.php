<?php $__env->startSection('content'); ?>
    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Tambah Item Baru</h1>
                <a href="<?php echo e(route('home')); ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <form action="<?php echo e(route('inventory.store')); ?>" method="POST" class="space-y-6" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="item" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" name="item" id="item" value="<?php echo e(old('item')); ?>"
                                   autocomplete="off" aria-describedby="item-error"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            <?php $__errorArgs = ['item'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span id="item-error" class="text-red-500 text-sm mt-1 block"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="category" id="category"
                                    aria-describedby="category-error"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                    $categories = ['Elektronik', 'Pakaian', 'Makanan', 'Minuman', 'Kesehatan', 'Alat Tulis', 'Lainnya'];
                                ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category); ?>" <?php echo e(old('category') == $category ? 'selected' : ''); ?>>
                                        <?php echo e($category); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span id="category-error" class="text-red-500 text-sm mt-1 block"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                            <input type="number" name="quantity" id="quantity" min="0" value="<?php echo e(old('quantity')); ?>"
                                   autocomplete="off" aria-describedby="quantity-error"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span id="quantity-error" class="text-red-500 text-sm mt-1 block"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="price" id="price" min="0" value="<?php echo e(old('price')); ?>"
                                   autocomplete="off" aria-describedby="price-error"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span id="price-error" class="text-red-500 text-sm mt-1 block"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="<?php echo e(route('inventory.index')); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600">
                            <i class="fas fa-save mr-2"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\inventory-management-system\resources\views/create.blade.php ENDPATH**/ ?>