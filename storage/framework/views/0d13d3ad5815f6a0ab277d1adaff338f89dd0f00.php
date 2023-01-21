<?php
    // admin_enqueue_styles('gmz-quill');
    // admin_enqueue_scripts('gmz-quill');
    // admin_enqueue_scripts('gmz-quill-image-resize');
    admin_enqueue_scripts('gmz-tiny-mce');
    admin_enqueue_scripts('gmz-tiny-mce-config');
    if(empty($value)){
        $value = $std;
    }
    $langs = $translation == false ? [""] : get_languages_field();
    $classLangs = '';
    if(!empty($langs) && !empty($langs[0])){
        $classLangs = 'has-editor-translation';
    }
    if(isset($serviceData)){
        $classEditor = \TorMorten\Eventy\Facades\Eventy::filter('gmz_editor_field_class', '', $serviceData);
    }else{
        $classEditor = '';
    }
?>
<?php if(isset($serviceData)): ?>
    <?php app('eventy')->action('gmz_before_editor_field', $serviceData); ?>
<?php endif; ?>
<div class="gmz-editor-media sdfsdfsdfsdf" data-toggle="modal" data-multi="true" data-target="#gmzMediaModal" data-url="<?php echo e(dashboard_url('all-media')); ?>" data-name="<?php echo e($id); ?>"></div>
<div class="<?php echo e($classEditor); ?> gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?> <?php if($translation == true): ?> gmz-field-has-translation <?php endif; ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?> data-condition="<?php echo e($condition); ?>" <?php endif; ?> <?php echo e($classLangs); ?>>
    <label for="gmz-field-<?php echo e($id); ?>"><?php echo e(__($label)); ?></label>

    <?php
        $value = str_replace('\\', '', $value);
    ?>

    <?php
        $value = str_replace('\\', '', $value);
    ?>

    <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="height: 100%;" class="<?php echo e(get_lang_class($key, $item)); ?>" <?php if(!empty($item)): ?> data-lang="<?php echo e($item); ?>" <?php endif; ?>>
            
            <textarea class="gmz-editor-content gmz-hidden-field" style="margin-bottom: 50px" name="<?php echo e($id); ?><?php echo e(get_lang_suffix($item)); ?>"><?php echo get_translate($value, $item); ?></textarea>
            <textarea id="gmz-field-<?php echo e($id); ?><?php echo e(get_lang_suffix($item)); ?>" class="myeditorinstance" ><?php echo get_translate($value, $item); ?></textarea>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <style>
        .tox-promotion{
            display: none !important;
        }
    </style>
</div>
<div class="clearfix"></div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/editor.blade.php ENDPATH**/ ?>