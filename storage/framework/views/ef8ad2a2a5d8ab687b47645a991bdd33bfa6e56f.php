

<?php $__env->startSection('title', __('Hotel Search Page')); ?>
<?php $__env->startSection('class_body', 'search-page'); ?>

<?php
    enqueue_styles([
        'slick',
        'daterangepicker'
    ]);
    enqueue_scripts([
        'slick',
        'moment',
        'daterangepicker',
        'jquery.nicescroll',
        'match-height',
        'gmz-search-hotel'
    ]);
?>

<?php $__env->startSection('content'); ?>
    <section class="search-archive-top bg-secondary">
        <div class="container">
            <div class="search-form-wrapper">
                <div class="hotel-search-form">
                    <?php
                        $text_slider = get_translate(get_option('hotel_slider_text'));
                    ?>
                    <?php if(!empty($text_slider)): ?>
                        <p class="_title"><?php echo e($text_slider); ?></p>
                    <?php endif; ?>
                    <?php echo $__env->make('Frontend::services.hotel.search-form', ['advanced' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="list-half-map gmz-search-result" data-action="<?php echo e(url('accommodation-search')); ?>">
        <div class="container-fluid">
            <div class="search-filter d-flex align-items-center">
                <div class="heading"><i class="fal fa-sliders-v-square"></i></div>
                <?php echo $__env->make('Frontend::services.hotel.filter.price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Frontend::services.hotel.filter.star', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Frontend::services.hotel.filter.term', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="row">
                <?php echo $__env->make('Frontend::services.hotel.search.result', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Frontend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/search.blade.php ENDPATH**/ ?>