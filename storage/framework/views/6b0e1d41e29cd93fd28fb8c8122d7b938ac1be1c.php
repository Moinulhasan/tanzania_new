<?php if(is_enable_service(GMZ_SERVICE_TOUR)): ?>
    <?php
        enqueue_scripts('match-height');
        $list_tours = get_posts([
            'post_type' => GMZ_SERVICE_TOUR,
            'posts_per_page' => 6,
            'status' => 'publish'
        ]);
        $search_url = url('tour-search');
    ?>
    <?php if(!$list_tours->isEmpty()): ?>
        <section class="list-tour list-tour--grid py-40 bg-gray-100">
            <div class="container">
                <h2 class="section-title mt-3 mb-20 text-center"><?php echo e(__('OUR BEST SELLING TANZANIA SAFARIS & TOURS')); ?></h2>
                <p class="text-center">These are our most popular Tanzania safari & tours packages booked by visitors traveling to Tanzania. Perfect for those who do not have the time to design their own itineraries. <br>
                    For those who have specific needs and interests, we also offer custom designed tour itineraries, at no extra cost.</p>
                <div class="row">
                    <?php $__currentLoopData = $list_tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <?php echo $__env->make('Frontend::services.tour.items.grid-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="d-flex align-items-center col-lg-12 mt-5">
                    <div class="mx-auto">
                        <a class="btn btn-primary px-3" href="<?php echo e(route('tour-search')); ?>"><?php echo e(__('MORE TOUR PACKAGES')); ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/tour/items/recent.blade.php ENDPATH**/ ?>