<?php
    if(empty($value))
        $value = $std;

    $post_type = get_config_posttype($post_type);
?>
<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?>>
    <label for="gmz-field-<?php echo e($id); ?>"><i data-feather="link"></i> <?php echo e(__($label)); ?></label>
    <div class="permalink-wrapper d-flex align-items-center">
        <span><?php echo e(url($post_type['slug'])); ?>/</span>
        <input type="text" name="<?php echo e($id); ?>" class="form-control" id="gmz-field-<?php echo e($id); ?>" value="<?php echo e($value); ?>"/>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/permalink.blade.php ENDPATH**/ ?>