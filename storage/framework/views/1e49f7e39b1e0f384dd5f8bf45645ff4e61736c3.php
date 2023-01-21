<div class="hotel-star">
    <?php
        echo hotel_star($post['hotel_star'])
    ?>
</div>
<h1 class="post-title">
    <?php echo add_wishlist_box($post['id'], GMZ_SERVICE_HOTEL); ?>
    <?php echo e(get_translate($post['post_title'])); ?>

    <?php if($post['is_featured'] == 'on'): ?>
        <span class="is-featured"><?php echo e(__('Featured')); ?></span>
    <?php endif; ?>
</h1>
<p class="location">
    <i class="fal fa-map-marker-alt"></i> <?php echo e(get_translate($post['location_address'])); ?>

</p>
<?php if(!empty($post['rating'])): ?>
    <?php
        $review_number = get_comment_number($post['id'], $post['post_type']);
    ?>
    <div class="count-reviews">
        <span><?php echo e($post['rating']); ?><small>/5</small><i class="fa fa-star"></i></span> <?php echo e(sprintf(_n(__('from %s review'), __('from %s reviews'), $review_number), $review_number)); ?>

    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/single/header.blade.php ENDPATH**/ ?>