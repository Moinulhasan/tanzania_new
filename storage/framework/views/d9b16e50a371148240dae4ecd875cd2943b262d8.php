<?php if(is_enable_service(GMZ_SERVICE_CAR)): ?>
    <?php
        enqueue_scripts('match-height');
        $list_cars = get_posts([
            'post_type' => GMZ_SERVICE_CAR,
            'posts_per_page' => 3,
            'status' => 'publish'
        ]);
        $search_url = url('car-search');
    ?>
    <?php if(!$list_cars->isEmpty()): ?>
        <section class="list-car list-car--grid py-40 bg-gray-100">
            <div class="container">
                <h2 class="section-title mb-20"><?php echo e(__('List Of Cars')); ?></h2>
                <div class="row">
                    <?php $__currentLoopData = $list_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <?php echo $__env->make('Frontend::services.car.items.grid-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/car/items/recent.blade.php ENDPATH**/ ?>