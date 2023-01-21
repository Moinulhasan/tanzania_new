<?php
    $nearby_locations = [
        [
            'title' => __('What\'s Nearby'),
            'data' => maybe_unserialize($post['nearby_common'])
        ],
        [
            'title' => __('Closest Education'),
            'data' => maybe_unserialize($post['nearby_education'])
        ],
        [
            'title' => __('Closest Health'),
            'data' => maybe_unserialize($post['nearby_health'])
        ],
        [
            'title' => __('Top attractions'),
            'data' => maybe_unserialize($post['nearby_top_attractions'])
        ],
        [
            'title' => __('Restaurants & Cafes'),
            'data' => maybe_unserialize($post['nearby_restaurants_cafes'])
        ],
        [
            'title' => __('Natural Beauty'),
            'data' => maybe_unserialize($post['nearby_natural_beauty'])
        ],
        [
            'title' => __('Closest Airports'),
            'data' => maybe_unserialize($post['nearby_airports'])
        ]
    ]
?>
<?php if(!empty($nearby_locations)): ?>
    <?php $__currentLoopData = $nearby_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($val['data'])): ?>
        <section class="feature nearby-location">
            <h2 class="section-title"><?php echo e($val['title']); ?></h2>
            <div class="section-content">
                <ul>
                    <?php $__currentLoopData = $val['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <span class="addr"><?php echo e(get_translate($v['title'])); ?></span>
                            <span class="dist"><?php echo e($v['distance']); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/single/nearby-location.blade.php ENDPATH**/ ?>