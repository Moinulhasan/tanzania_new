<div class="meta">
    <?php
        $property_type = $post['property_type'];
        $checkin_time = $post['checkin_time'];
        $checkout_time = $post['checkout_time'];
        $min_day_booking = $post['min_day_booking'];
        $min_day_stay = $post['min_day_stay'];
    ?>
    <ul>
        <?php if(!empty($property_type)): ?>
            <?php
                $property_type = get_term('id', $property_type);
            ?>
            <?php if($property_type): ?>
                <li>
                    <span class="value"><?php echo e(get_translate($property_type->term_title)); ?></span>
                    <span class="label"><?php echo e(__('Type')); ?></span>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(!empty($checkin_time)): ?>
            <li>
                <span class="value"><?php echo e($checkin_time); ?></span>
                <span class="label"><?php echo e(__('Checkin')); ?></span>
            </li>
        <?php endif; ?>

        <?php if(!empty($checkout_time)): ?>
            <li>
                <span class="value"><?php echo e($checkout_time); ?></span>
                <span class="label"><?php echo e(__('Checkout')); ?></span>
            </li>
        <?php endif; ?>

        <?php if(!empty($min_day_booking)): ?>
            <li>
                <span class="value"><?php echo e(sprintf(_n(__('%s day'), __('%s days'), $min_day_booking), $min_day_booking)); ?></span>
                <span class="label"><?php echo e(__('M.D.B.B')); ?><span class="text-danger">*</span></span>
            </li>
        <?php endif; ?>

        <?php if(!empty($min_day_stay)): ?>
            <li>
                <span class="value"><?php echo e(sprintf(_n(__('%s day'), __('%s days'), $min_day_stay), $min_day_stay)); ?></span>
                <span class="label"><?php echo e(__('M.D Stay')); ?><span class="text-danger">**</span></span>
            </li>
        <?php endif; ?>

    </ul>
    <?php if(!empty($min_day_booking)): ?>
    <div><small><span class="text-danger">*</span> <?php echo e(__('Min day before booking')); ?></small></div>
    <?php endif; ?>
    <?php if(!empty($min_day_stay)): ?>
    <div><small><span class="text-danger">**</span> <?php echo e(__('Min day stay')); ?></small></div>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/single/meta.blade.php ENDPATH**/ ?>