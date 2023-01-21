<?php
    admin_enqueue_styles('gmz-checkbox');
    if(empty($value)){
        $value = $std;
    }

    if(is_string($value) && $value !== 'all'){
        $value = json_decode($value, true);
    }

    if(!isset($choices))
        $choices = [];

    if(!isset($column))
        $column = 'col-lg-12';

    if(!is_array($choices) && strpos($choices, ':')){
        $choices_arr = explode(':', $choices);
        if(isset($choices_arr[0])){
            switch ($choices_arr[0]){
                case 'term':
                    $choices = get_terms_recursive([], get_terms($choices_arr[1], $choices_arr[2], 'full'), 0, false);
                    break;
            }
        }
    }

    $langs = $translation == false ? [""] : get_languages_field();
?>
<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?>>
    <label for="gmz-field-<?php echo e($id); ?>"><?php echo e(__($label)); ?></label>

    <?php if(!empty($choices)): ?>
        <div class="row">
            <?php $__currentLoopData = $choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo e($column); ?> n-chk mb-2">
                    <label class="new-control new-checkbox checkbox-primary">
                        <input type="checkbox" name="<?php echo e($id); ?>[]" class="new-control-input" value="<?php echo e($key); ?>" <?php if($value == 'all' || (!empty($value) && in_array($key, $value))): ?> checked <?php endif; ?> />
                        <span class="new-control-indicator"></span>
                        <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="<?php echo e(get_lang_class($key, $item)); ?>" <?php if(!empty($item)): ?>
                            data-lang="<?php echo e($item); ?>" <?php endif; ?>>
                            <?php echo e(get_translate($val, $item)); ?>

                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p>
        <small><i><?php echo e(__('No data')); ?></i></small>
        </p>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/checkbox.blade.php ENDPATH**/ ?>