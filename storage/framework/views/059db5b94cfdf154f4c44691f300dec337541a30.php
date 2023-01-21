<?php
    admin_enqueue_scripts('jquery-ui');
    admin_enqueue_styles('jquery-ui');
    admin_enqueue_scripts('nested-sort-js');
    admin_enqueue_styles('gmz-custom-accordions');

    if(empty($value))
       $value = $std;

    if(!is_array($value)){
       $value = [];
    }
?>
<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?> data-binding="gmz-field-<?php echo e($id . '[' . $binding . ']'); ?>">
    <label for="gmz-field-<?php echo e($id); ?>"><?php echo e(__($label)); ?></label>

    <div id="toggleAccordion<?php echo e($id); ?>" class="gmz-list-item sortable">
        <?php if(!empty($value)): ?>
            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $keys = array_keys($v);
                    $unique = time() . rand(0, 9999);
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo e($k); ?>">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordion<?php echo e($k); ?>" aria-expanded="true" aria-controls="defaultAccordion<?php echo e($k); ?>">
                                <span class="item-title">
                                    <?php if(!empty($v[$keys[0]])): ?>
                                        <?php echo e(get_translate($v[$keys[0]])); ?>

                                    <?php else: ?>
                                        <?php echo e(__('Title')); ?>

                                    <?php endif; ?>
                                </span>
                                <div class="icons d-flex align-items-center">
                                    <?php echo get_icon('icon_system_pencil', '', '15px', '15px'); ?>

                                    &nbsp;
                                    <span class="delete-item"><?php echo get_icon('icon_system_delete', '#cc0000',  '15px', '15px'); ?></span>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div id="defaultAccordion<?php echo e($k); ?>" class="collapse" aria-labelledby="heading<?php echo e($k); ?>" data-parent="#toggleAccordion<?php echo e($id); ?>">
                        <div class="card-body">
                            <?php if(!empty($fields)): ?>
                                <div class="row">
                                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $item = array_merge(get_option_default_fields(), $item);
                                        if(isset($v[$item['id']])){
                                            $item['value'] = $v[$item['id']];
                                        }
                                        if($item['type'] == 'checkbox'){
                                            $item['id'] = $id . '[' . $item['id'] . ']['. $k .']';
                                        }else{
                                            $item['id'] = $id . '[' . $item['id'] . ']['. $k .'][]';
                                        }
                                    ?>

                                    <?php echo $__env->make('Backend::settings.fields.render', [
                                        'field' => $item
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <button type="button" class="btn btn-success btn-sm add-list-item mt-2"
            data-action="<?php echo e(dashboard_url('get-list-item-html')); ?>" data-fields="<?php echo e(base64_encode(json_encode($fields))); ?>" data-id="<?php echo e($id); ?>">
        <?php echo e(__('Add New')); ?>

    </button>
    <?php if($description): ?>
        <small class="d-block mt-1"><?php echo balance_tags(__($description)); ?></small>
    <?php endif; ?>
</div>
<?php if($break): ?>
    <div class="w-100"></div> <?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/list_item.blade.php ENDPATH**/ ?>