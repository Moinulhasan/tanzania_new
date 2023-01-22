<?php
    if(empty($value)){
        $value = $std;
    }

    if(!isset($rows)){
        $rows = 5;
    }

    $langs = $translation == false ? [""] : get_languages_field();
?>
<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?> <?php if($translation == true): ?> gmz-field-has-translation <?php endif; ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?>>
    <label for="gmz-field-<?php echo e($id); ?>"><?php echo e(__($label)); ?></label>
    <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <textarea name="<?php echo e($id); ?><?php echo e(get_lang_suffix($item)); ?>"
                  class="form-control <?php if(!empty($validation)): ?> gmz-validation <?php endif; ?> <?php echo e(get_lang_class($key, $item)); ?>"
                  id="gmz-field-<?php echo e($id); ?><?php echo e(get_lang_suffix($item)); ?>"
                  rows="<?php echo e($rows); ?>"
                  data-validation="<?php echo e($validation); ?>"
                  <?php if(!empty($item)): ?> data-lang="<?php echo e($item); ?>" <?php endif; ?>><?php echo e(get_translate($value, $item)); ?></textarea>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($description): ?>
        <small><?php echo balance_tags(__($description)); ?></small>
    <?php endif; ?>
</div>
<?php if($break): ?>
    <div class="w-100"></div> <?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/settings/fields/textarea.blade.php ENDPATH**/ ?>