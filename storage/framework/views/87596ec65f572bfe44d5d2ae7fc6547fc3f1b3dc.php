<?php
    $policies = maybe_unserialize($post['policy']);
?>
<?php if($enable_cancellation == 'on' || !empty($policies)): ?>
<section class="policy">
    <h2 class="section-title"><?php echo e(__('Policies')); ?></h2>
    <div class="section-content">
        <?php if($enable_cancellation == 'on'): ?>
            <div class="cancel-wrapper">
            <div class="cancel-day">
                <?php echo e(sprintf(__('Customers can cancel this Hotel before %s day(s)'), $cancel_before)); ?>

            </div>
            <?php if(!empty($cancellation_detail)): ?>
                <div class="cancel-detail">
                    <?php echo e(get_translate($cancellation_detail)); ?>

                </div>
            <?php endif; ?>
            </div>
        <?php endif; ?>


        <?php if(!empty($policies)): ?>
            <div class="hotel-policy">
                <?php $__currentLoopData = $policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="label">
                        <?php echo e(get_translate($v['title'])); ?>

                    </div>
                    <div class="value">
                        <?php echo balance_tags(nl2br(get_translate($v['content']))) ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/hotel/single/policy.blade.php ENDPATH**/ ?>