<?php
    if(empty($value))
        $value = $std;

    $value_temp = $value;
    if(!empty($value)){
        $value = explode(',', $value);
    }
    admin_enqueue_scripts('jquery-ui');
    admin_enqueue_styles('jquery-ui');
?>
<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?>>
    <label for="gmz-field-<?php echo e($id); ?>"><?php echo e(__($label)); ?></label>
    <div class="media-wrapper <?php if(!empty($value)): ?> has-media <?php endif; ?>">
        <?php if(empty($value)): ?>
        <div class="thumbnail" data-toggle="modal" data-target="#gmzMediaModal" data-url="<?php echo e(dashboard_url('all-media')); ?>" data-multi="true">
            <span class="add-icon">+</span>
            <?php if(!empty($media_url)): ?>
                <img src="<?php echo e($media_url); ?>" />
            <?php endif; ?>
        </div>
        <?php else: ?>
            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $media_url = get_attachment_url($val, [150, 150]);
                ?>
                <div class="thumbnail <?php if($key > 0): ?> appended <?php endif; ?>" data-toggle="modal" data-target="#gmzMediaModal" data-url="<?php echo e(dashboard_url('all-media')); ?>" data-multi="true" data-id="<?php echo e($val); ?>">
                    <span class="add-icon">+</span>
                    <?php if(!empty($media_url)): ?>
                        <img src="<?php echo e($media_url); ?>" />
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="action d-flex align-items-center">
            <a href="javascript:void(0)" class="text-success" data-toggle="modal" data-target="#gmzMediaModal" data-url="<?php echo e(dashboard_url('all-media')); ?>" data-multi="true"><?php echo e(__('Add image')); ?></a>
            <a href="javascript:void(0)" class="ml-3 text-danger btn-remove d-none"><?php echo e(__('Remove')); ?></a>
        </div>
        <input type="hidden" name="<?php echo e($id); ?>" class="form-control" id="gmz-field-<?php echo e($id); ?>" value="<?php echo e($value_temp); ?>"/>
    </div>
</div>
<?php if($break): ?>
    <div class="w-100"></div> <?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/gallery.blade.php ENDPATH**/ ?>