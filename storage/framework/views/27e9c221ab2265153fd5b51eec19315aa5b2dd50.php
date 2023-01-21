<?php if(is_enable_service(GMZ_SERVICE_APARTMENT)): ?>
    <?php
        enqueue_scripts('match-height');
        $list_apartments = get_posts([
            'post_type' => GMZ_SERVICE_APARTMENT,
            'posts_per_page' => 3,
            'status' => 'publish',
            'is_featured' => 'on'
        ]);
        $search_url = url('apartment-search');
    ?>
    <?php if(!$list_apartments->isEmpty()): ?>
        <section class="list-apartment list-apartment--grid py-40 bg-gray-100">
            <div class="container">
                <h2 class="section-title mb-20"><?php echo e(__('List Of Apartments')); ?></h2>
                <div class="row">
                    <?php $__currentLoopData = $list_apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <?php echo $__env->make('Frontend::services.apartment.items.grid-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/apartment/items/recent.blade.php ENDPATH**/ ?>