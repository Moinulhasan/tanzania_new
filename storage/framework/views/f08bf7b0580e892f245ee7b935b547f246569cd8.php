<?php
    $copy_right = get_option('footer_copyright');
?>
<div class="footer-wrapper">
    <div class="footer-section f-section-1">
        <p class="">
            <?php if(!empty($copy_right)): ?>
                <?php echo e(get_translate($copy_right)); ?>

            <?php else: ?>
                ©<?php echo e(date('Y')); ?> Book My Tour - All rights reserved.
            <?php endif; ?>
        </p>
    </div>
</div>

<?php echo $__env->make('Backend::components.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/components/footer.blade.php ENDPATH**/ ?>