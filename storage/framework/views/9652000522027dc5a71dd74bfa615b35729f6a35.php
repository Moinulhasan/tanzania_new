<?php if(is_enable_service(GMZ_SERVICE_HOTEL)): ?>
    <?php
        enqueue_scripts('match-height');
        $list_hotels = get_posts([
            'post_type' => GMZ_SERVICE_HOTEL,
            'posts_per_page' => 4,
            'status' => 'publish'
        ]);
        $search_url = url('hotel-search');
    ?>
    <?php if(!$list_hotels->isEmpty()): ?>
        <section class="list-hotel list-hotel--grid py-40 bg-gray-100">
            <div class="container">
                <h2 class="section-title mb-20"><?php echo e(__('List Of Hotels')); ?></h2>
                <div class="row">
                    <?php $__currentLoopData = $list_hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <?php echo $__env->make('Frontend::services.hotel.items.grid-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/items/recent.blade.php ENDPATH**/ ?>