

<?php $__env->startSection('title', __('Hotel')); ?>

<?php
    enqueue_styles([
        'slick',
        'daterangepicker'
    ]);
    enqueue_scripts([
        'slick',
        'moment',
        'daterangepicker'
    ]);
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('Frontend::services.hotel.items.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Frontend::services.hotel.items.type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Frontend::services.hotel.items.recent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('Frontend::services.hotel.items.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Frontend::components.sections.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Frontend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/hotel/index.blade.php ENDPATH**/ ?>