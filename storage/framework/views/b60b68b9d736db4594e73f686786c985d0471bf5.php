<?php
    $default_field = get_option_default_fields();
?>
<?php if(!empty($fields)): ?>
    <div class="row">
    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $val = array_merge( $default_field, $val );
            if(!empty($data_temp)){
                if(isset($data_temp[$val['id']])){
                    $val['value'] = $data_temp[$val['id']];
                }
            }
            if(isset($data['term_id']) && !empty($data['term_id'])){
                if($val['id'] == 'parent'){
                    $val['choices'] .= ':ex:' . $data['term_id'];
                }
            }
            $val_temp = $val['id'] . '_' . $page_id;
            $val['id'] = $val_temp;
        ?>
        <?php echo $__env->make('Backend::settings.fields.render', [
            'field' => $val
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning mb-0"><?php echo e(__('No config fields')); ?></div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/seo.blade.php ENDPATH**/ ?>