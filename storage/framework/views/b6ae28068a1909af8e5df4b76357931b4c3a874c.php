<?php
    if(empty($value))
        $value = $std;

    $media_url = '';
    if(!empty($value) && is_numeric($value)){
        $media_url = get_attachment_url($value, [150, 150]);
    }
?>
<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?>>
    <label for="gmz-field-<?php echo e($id); ?>"><?php echo e(__($label)); ?></label>
    <div class="media-wrapper <?php if(!empty($media_url)): ?> has-media <?php endif; ?>">
        <div class="thumbnail" data-toggle="modal" data-target="#gmzMediaModal" data-url="<?php echo e(dashboard_url('all-media')); ?>">
            <span class="add-icon">+</span>
            <?php if(!empty($media_url)): ?>
                <img src="<?php echo e($media_url); ?>" />
            <?php endif; ?>
        </div>
        <div class="action d-flex align-items-center">
            <a href="javascript:void(0)" class="text-success" data-toggle="modal" data-target="#gmzMediaModal" data-url="<?php echo e(dashboard_url('all-media')); ?>"><?php echo e(__('Add image')); ?></a>
            <a href="javascript:void(0)" class="ml-3 text-danger btn-remove d-none"><?php echo e(__('Remove')); ?></a>
        </div>
        <input type="hidden" name="<?php echo e($id); ?>" class="form-control" id="gmz-field-<?php echo e($id); ?>" value="<?php echo e($value); ?>"/>
    </div>
</div>
<?php if($break): ?>
    <div class="w-100"></div> <?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/settings/fields/image.blade.php ENDPATH**/ ?>