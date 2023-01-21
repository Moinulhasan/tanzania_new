<div class="seo-variable" data-text-copied="<?php echo e(__('Copied')); ?>" data-text-copy="<?php echo e(__('Copy')); ?>">
    <div class="label"><?php echo e(__('SEO Variables')); ?></div>
    <ul>
        <?php if(isset($is_content_type)): ?>
            <li><b id="c-title-<?php echo e($variable_type); ?>" onclick="selectText('c-title-<?php echo e($variable_type); ?>')" data-toggle="tooltip"
                   title="<?php echo e(__('Copy')); ?>">{title}</b><?php echo e(__('The Post Title')); ?></li>
            <li><b id="c-description-<?php echo e($variable_type); ?>" onclick="selectText('c-description-<?php echo e($variable_type); ?>')" data-toggle="tooltip"
                   title="<?php echo e(__('Copy')); ?>">{description}</b><?php echo e(__('The Post Description')); ?></li>
        <?php endif; ?>
        <li><b id="c-site-name-<?php echo e($variable_type); ?>" onclick="selectText('c-site-name-<?php echo e($variable_type); ?>')" data-toggle="tooltip"
               title="<?php echo e(__('Copy')); ?>">{site_name}</b><?php echo e(__('The Site Name')); ?></li>
        <li><b id="c-site-description-<?php echo e($variable_type); ?>" onclick="selectText('c-site-description-<?php echo e($variable_type); ?>')" data-toggle="tooltip"
               title="<?php echo e(__('Copy')); ?>">{site_description}</b><?php echo e(__('The Site Description')); ?></li>
        <li><b id="c-separator-<?php echo e($variable_type); ?>" onclick="selectText('c-separator-<?php echo e($variable_type); ?>')" data-toggle="tooltip"
               title="<?php echo e(__('Copy')); ?>">{separator}</b><?php echo e(__('The Separator Character')); ?></li>
    </ul>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/screens/admin/seo/components/variable.blade.php ENDPATH**/ ?>