<?php
    admin_enqueue_styles('gmz-switches');
    if(empty($value))
        $value = $std;
?>
<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?>>
    <label><?php echo e(__($label)); ?></label><br />
    <label class="gmz-switcher switch s-icons s-outline  s-outline-primary  mb-0">
        <input id="gmz-field-<?php echo e($id); ?>" type="checkbox" <?php if($value == 'on'): ?> checked <?php endif; ?> class="for-switcher">
        <span class="slider round"></span>
        <input type="hidden" name="<?php echo e($id); ?>" value="<?php echo e($value); ?>" />
    </label>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/switcher.blade.php ENDPATH**/ ?>