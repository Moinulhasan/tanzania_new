<?php
    $img = get_attachment_url($item->thumbnail_id, [360, 240]);
    $title = get_translate($item->post_title);
    $type = get_term('id', $item->apartment_type);
    $location = get_translate($item->location_address);
    $search_url = url('apartment-search');
?>
<div class="apartment-item apartment-item--grid" data-plugin="matchHeight">
    <div class="apartment-item__thumbnail">
        <?php echo add_wishlist_box($item->id, GMZ_SERVICE_APARTMENT); ?>
        <a href="<?php echo e(get_apartment_permalink($item->post_slug)); ?>">
            <img src="<?php echo e($img); ?>" alt="<?php echo e($title); ?>">
        </a>
        <?php if(!empty($type)): ?>
            <?php
                $search_url = add_query_arg(['apartment_type' => $type->id], $search_url);
            ?>
            <a class="apartment-item__type" href="<?php echo e($search_url); ?>">
                <?php echo e(get_translate($type->term_title)); ?>

            </a>
        <?php endif; ?>
    </div>
    <div class="apartment-item__details">
        <?php if($item->is_featured == 'on'): ?>
            <span class="apartment-item__label"><?php echo e(__('Featured')); ?></span>
        <?php endif; ?>
        <h3 class="apartment-item__title"><a href="<?php echo e(get_apartment_permalink($item->post_slug)); ?>"><?php echo e($title); ?></a></h3>
        <div class="apartment-item__meta">
            <div class="i-meta" data-toggle="tooltip" title="<?php echo e(__('Guests')); ?>">
                <span class="i-meta__icon"><?php echo get_icon('icon_system_passenger'); ?></span>
                <span class="i-meta__figure"><?php echo e($item->number_of_guest); ?></span>
            </div>
            <div class="i-meta" data-toggle="tooltip" title="<?php echo e(__('Bedroom')); ?>">
                <span class="i-meta__icon"><?php echo get_icon('icon_system_bedroom'); ?></span>
                <span class="i-meta__figure"><?php echo e($item->number_of_bedroom); ?></span>
            </div>
            <div class="i-meta" data-toggle="tooltip" title="<?php echo e(__('Bathroom')); ?>">
                <span class="i-meta__icon"><?php echo get_icon('icon_system_bathroom'); ?></span>
                <span class="i-meta__figure"><?php echo e($item->number_of_bathroom); ?></span>
            </div>
            <div class="i-meta" data-toggle="tooltip" title="<?php echo e(__('Size')); ?>">
                <span class="i-meta__icon"><?php echo get_icon('icon_system_size'); ?></span>
                <span class="i-meta__figure"><?php echo e(get_translate($item->size)); ?> <?php echo e(get_option('unit_of_measure', 'm2')); ?></span>
            </div>
        </div>
        <?php if(!empty($location)): ?>
            <p class="apartment-item__location"><i class="fas fa-map-marker-alt mr-2"></i><?php echo e($location); ?></p>
        <?php endif; ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="apartment-item__price">
                <span class="_retail"><?php echo e(convert_price($item->base_price)); ?></span><span class="_unit"><?php echo e(__('per night')); ?></span>
            </div>
            <a class="btn btn-primary apartment-item__view-detail" href="<?php echo e(get_apartment_permalink($item->post_slug)); ?>"><?php echo e(__('View Detail ')); ?></a>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/apartment/items/grid-item.blade.php ENDPATH**/ ?>