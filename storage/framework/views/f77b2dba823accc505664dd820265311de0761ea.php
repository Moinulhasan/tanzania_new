<?php
    $img = get_attachment_url($item->thumbnail_id, [360, 240]);
    $title = get_translate($item->post_title);
    $type = get_term('id', $item->service);
    $location = get_translate($item->location_address);
    $search_url = url('beauty-search');
?>
<div class="beauty-item beauty-item--grid" data-plugin="matchHeight">
    <div class="beauty-item__thumbnail">
        <?php echo add_wishlist_box($item->id, GMZ_SERVICE_BEAUTY); ?>
        <a href="<?php echo e(get_beauty_permalink($item->post_slug)); ?>">
            <img src="<?php echo e($img); ?>" alt="<?php echo e($title); ?>">
        </a>
        <?php if(!empty($type)): ?>
            <?php
                $search_url = add_query_arg(['service' => $type->id], $search_url);
            ?>
            <a class="beauty-item__type" href="<?php echo e($search_url); ?>">
                <?php echo e(get_translate($type->term_title)); ?>

            </a>
        <?php endif; ?>
    </div>
    <div class="beauty-item__details">
        <?php if($item->is_featured == 'on'): ?>
            <span class="beauty-item__label"><?php echo e(__('Featured')); ?></span>
        <?php endif; ?>
        <h3 class="beauty-item__title"><a href="<?php echo e(get_beauty_permalink($item->post_slug)); ?>"><?php echo e($title); ?></a></h3>
        <?php if(!empty($location)): ?>
            <p class="beauty-item__location"><i class="fas fa-map-marker-alt mr-2"></i><?php echo e(get_translate($item->location_address)); ?></p>
        <?php endif; ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="beauty-item__price">
                <span class="_retail"><?php echo e(convert_price($item->base_price)); ?></span>
            </div>
            <a class="btn btn-primary beauty-item__view-detail" href="<?php echo e(get_beauty_permalink($item->post_slug)); ?>"><?php echo e(__('View Detail')); ?></a>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/beauty/items/grid-item.blade.php ENDPATH**/ ?>