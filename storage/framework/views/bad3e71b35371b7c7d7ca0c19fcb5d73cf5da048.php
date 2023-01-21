<?php
    $img = get_attachment_url($item->thumbnail_id, [360, 240]);
    $title = get_translate($item->post_title);
    $type = get_term('id', $item->property_type);
    $location = get_translate($item->location_address);
    $search_url = url('hotel-search');
?>
<div class="hotel-item hotel-item--grid" data-plugin="matchHeight">
    <div class="hotel-item__thumbnail">

        <?php echo add_wishlist_box($item->id, GMZ_SERVICE_HOTEL); ?>

        <a href="<?php echo e(get_hotel_permalink($item->post_slug)); ?>">
            <img src="<?php echo e($img); ?>" alt="<?php echo e($title); ?>">
        </a>
        <?php if(!empty($type)): ?>
            <?php
                $search_url = add_query_arg(['property_type' => $type->id], $search_url);
            ?>
            <a class="hotel-item__type" href="<?php echo e($search_url); ?>">
                <?php echo e(get_translate($type->term_title)); ?>

            </a>
        <?php endif; ?>
    </div>
    <div class="hotel-item__details">
        <?php if($item->is_featured == 'on'): ?>
            <span class="hotel-item__label"><?php echo e(__('Featured')); ?></span>
        <?php endif; ?>
            <div class="hotel-item__rating">
                <?php echo hotel_star($item->hotel_star) ?>
            </div>
        <h3 class="hotel-item__title"><a href="<?php echo e(get_hotel_permalink($item->post_slug)); ?>"><?php echo e($title); ?></a></h3>
        <?php if(!empty($location)): ?>
            <p class="hotel-item__location"><i class="fas fa-map-marker-alt mr-2"></i><?php echo e(get_translate($item->location_address)); ?></p>
        <?php endif; ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="hotel-item__price">
                <span class="_retail"><?php echo e(convert_price($item->base_price)); ?></span><span class="_unit"><?php echo e(__('night')); ?></span>
            </div>
            <a class="btn btn-primary hotel-item__view-detail" href="<?php echo e(get_hotel_permalink($item->post_slug)); ?>"><?php echo e(__('View Detail ')); ?></a>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/hotel/items/grid-item.blade.php ENDPATH**/ ?>