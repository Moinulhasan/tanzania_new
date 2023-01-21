<?php if(!empty($field)): ?>
    <?php if(\Illuminate\Support\Facades\View::exists('Backend::settings.fields.' . $field['type'])): ?>
        <?php extract($field); ?>
        <?php echo $__env->make('Backend::settings.fields.' . $field['type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('Backend::settings.fields.not-exists', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/render.blade.php ENDPATH**/ ?>