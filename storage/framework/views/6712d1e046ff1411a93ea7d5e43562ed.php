<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold mb-4">History Perubahan Inventory</h3>
    <table class="w-full text-left">
        <thead class="bg-dark text-white">
            <tr>
                <th class="px-4 py-3">Waktu </th>
                <th class="px-4 py-3">Item</th>
                <th class="px-4 py-3">Aksi</th>
                <th class="px-4 py-3">Jumlah Sebelumnya</th>
                <th class="px-4 py-3">Jumlah Baru</th>
                <th class="px-4 py-3">User</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="px-4 py-3"><?php echo e($history->created_at->subHour()->setTimezone('Asia/Singapore')->format('Y-m-d H:i:s')); ?></td>
                <td class="px-4 py-3"><?php echo e($history->item); ?></td> 
                <td class="px-4 py-3"><?php echo e(ucfirst($history->action)); ?></td>
                <td class="px-4 py-3"><?php echo e($history->old_quantity); ?></td>
                <td class="px-4 py-3"><?php echo e($history->new_quantity); ?></td>
                <td class="px-4 py-3"><?php echo e($history->username ?? '-'); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center py-4">Belum ada history perubahan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\inventory-management-system\resources\views/history.blade.php ENDPATH**/ ?>