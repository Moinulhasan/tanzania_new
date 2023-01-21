<?php
    $list_hotels = get_posts([
        'post_type' => GMZ_SERVICE_HOTEL,
        'posts_per_page' => 3,
        'post_not_in' => [$post['id']],
        'nearby' => [
            'lat' => floatval($post['location_lat']),
            'lng' => floatval($post['location_lng']),
            'distance' => 50
        ],
    ]);
enqueue_scripts('match-height');
$search_url = url('hotel-search');
?>
<?php if(!$list_hotels->isEmpty()): ?>
    <section class="list-hotel list-hotel--grid py-40 bg-gray-100 mb-0 nearby">
        <div class="container">
            <h2 class="section-title mb-20"><?php echo e(__('Hotels Near By')); ?></h2>
            <div class="row">
                <?php $__currentLoopData = $list_hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $img = get_attachment_url($item->thumbnail_id, [360, 240]);
                        $title = get_translate($item->post_title);
                        $type = get_term('id', $item->property_type);
                    ?>
                    <div class="col-md-4">
                        <?php echo $__env->make('Frontend::services.hotel.items.grid-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/single/nearby.blade.php ENDPATH**/ ?>