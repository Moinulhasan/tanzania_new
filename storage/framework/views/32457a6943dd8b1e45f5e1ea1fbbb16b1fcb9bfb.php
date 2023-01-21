<?php
    $img = get_attachment_url($item->thumbnail_id, [360, 240]);
    $title = get_translate($item->post_title);
    $type = get_term('id', $item->car_type);
    $location = get_translate($item->location_address);
    $search_url = url('car-search');
?>
<div class="car-item car-item--grid" data-plugin="matchHeight">
    <div class="car-item__thumbnail">
        <?php echo add_wishlist_box($item->id, GMZ_SERVICE_CAR); ?>
        <a href="<?php echo e(get_car_permalink($item->post_slug)); ?>">
            <img src="<?php echo e($img); ?>" alt="<?php echo e($title); ?>">
        </a>
        <?php if(!empty($type)): ?>
            <?php
                $search_url = add_query_arg(['car_type' => $type->id], $search_url);
            ?>
            <a class="car-item__type" href="<?php echo e($search_url); ?>">
                <?php echo e(get_translate($type->term_title)); ?>

            </a>
        <?php endif; ?>
    </div>
    <div class="car-item__details">
        <?php if($item->is_featured == 'on'): ?>
        <span class="car-item__label"><?php echo e(__('Featured')); ?></span>
        <?php endif; ?>
        <h3 class="car-item__title"><a href="<?php echo e(get_car_permalink($item->post_slug)); ?>"><?php echo e($title); ?></a></h3>
        <div class="car-item__meta">
            <div class="i-meta" data-toggle="tooltip" title="<?php echo e(__('Passenger')); ?>">
                <span class="i-meta__icon"><?php echo get_icon('icon_system_passenger'); ?></span>
                <span class="i-meta__figure"><?php echo e($item->passenger); ?></span>
            </div>
            <div class="i-meta" data-toggle="tooltip" title="<?php echo e(__('Doors')); ?>">
                <span class="i-meta__icon"><?php echo get_icon('icon_system_door'); ?></span>
                <span class="i-meta__figure"><?php echo e($item->door); ?></span>
            </div>
            <div class="i-meta" data-toggle="tooltip" title="<?php echo e(__('Baggage')); ?>">
                <span class="i-meta__icon"><?php echo get_icon('icon_system_baggage'); ?></span>
                <span class="i-meta__figure"><?php echo e($item->baggage); ?></span>
            </div>
            <div class="i-meta" data-toggle="tooltip" title="<?php echo e(__('Gear Shift')); ?>">
                <span class="i-meta__icon"><?php echo get_icon('icon_system_gear_shift'); ?></span>
                <span class="i-meta__figure"><?php echo e(get_gear_shift($item->gear_shift)); ?></span>
            </div>
        </div>
            <?php if(!empty($location)): ?>
        <p class="car-item__location"><i class="fas fa-map-marker-alt mr-2"></i><?php echo e(get_translate($item->location_address)); ?></p>
            <?php endif; ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="car-item__price">
                <span class="_retail"><?php echo e(convert_price($item->base_price)); ?></span><span class="_unit"><?php echo e(__('per day')); ?></span>
            </div>
            <a class="btn btn-primary car-item__view-detail" href="<?php echo e(get_car_permalink($item->post_slug)); ?>"><?php echo e(__('View Detail ')); ?></a>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/car/items/grid-item.blade.php ENDPATH**/ ?>