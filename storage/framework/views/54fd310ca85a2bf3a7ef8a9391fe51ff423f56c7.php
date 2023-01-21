<?php if(is_enable_service(GMZ_SERVICE_CAR)): ?>
<?php
enqueue_scripts('match-height');
$car_types = get_terms('name', 'car-type', 'full');
$search_url = url('car-search');
?>
<?php if(!$car_types->isEmpty()): ?>
<section class="car-type">
    <div class="container py-40">
        <h2 class="section-title mb-20"><?php echo e(__('Car Types')); ?></h2>
        <div class="row">
            <?php $__currentLoopData = $car_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $img = get_attachment_url($item->term_image, [300, 200]);
                $term_title = get_translate($item->term_title);
                $search_url = add_query_arg(['car_type' => $item->id], $search_url);
                ?>
            <div class="col-lg-4 col-md-6">
                <div class="car-type__item" data-plugin="matchHeight">
                    <div class="car-type__left">
                        <h3 class="car-type__name"><a href="<?php echo e($search_url); ?>"><?php echo e($term_title); ?></a></h3>
                        <div class="car-type__description">
                            <?php echo e(get_translate($item->term_description)); ?>

                        </div>
                        <a href="<?php echo e($search_url); ?>" class="btn btn-primary car-type__detail"><?php echo e(__('View Detail')); ?></a>
                    </div>
                    <div class="car-type__right">
                        <a href="<?php echo e($search_url); ?>">
                            <img class="_image-car" src="<?php echo e($img); ?>" alt="<?php echo e($term_title); ?>">
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/car/items/type.blade.php ENDPATH**/ ?>