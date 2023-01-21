
<?php $__currentLoopData = $scripts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($val['queue']): ?>
        <?php
            $v = '';
            if(!empty($val['v'])){
                $v = '?v=' . $val['v'];
            }
        ?>
        <script src="<?php echo e($val['url'] . $v); ?>"></script>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/components/scripts.blade.php ENDPATH**/ ?>