<h5 class="header-title mb-0 font-weight-normal"><?php echo e(__('Menu Items')); ?></h5>
<?php
    $items = ['page', 'post', 'hotel', 'car', 'apartment', 'space', 'tour', 'beauty', 'link', 'category', 'tag'];
?>
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('Backend::screens.admin.menu.items.' . $item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/menu/sidebar.blade.php ENDPATH**/ ?>