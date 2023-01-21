<?php
    if(empty($value)){
        $value = $std;
    }

    if(!isset($min_max_step) || count($min_max_step) != 3){
        $min_max_step = [0, 50, 1];
    }

?>
<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?>>
    <label for="gmz-field-<?php echo e($id); ?>"><?php echo e(__($label)); ?></label>
    <input
            <?php if($min_max_step[0] != -1): ?> min="<?php echo e($min_max_step[0]); ?>" <?php endif; ?>
            <?php if($min_max_step[1] != -1): ?> max="<?php echo e($min_max_step[1]); ?>" <?php endif; ?>
            <?php if($min_max_step[2] != -1): ?> step="<?php echo e($min_max_step[2]); ?>" <?php endif; ?>
            type="number"
            name="<?php echo e($id); ?>"
            class="form-control"
            id="gmz-field-<?php echo e($id); ?>"
            value="<?php echo e($value); ?>"/>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/number.blade.php ENDPATH**/ ?>