<div class="widget-content widget-content-area">
    <div id="circle-basic" class="gmz-form-wizard-wrapper" data-plugin="wizard-circle">
        <?php echo $__env->make('Backend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(!empty($settings)): ?>
            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h3><?php echo e(__($val['label'])); ?></h3>
                <section class="mt-4">
                    <form class="gmz-form-action form-translation" action="<?php echo e($action); ?>" method="POST" data-loader="body">
                        <input type="hidden" name="post_id" value="<?php echo e($serviceData['id']); ?>" />
                        <?php
                            if (!isset($item['translation']) || (isset($item['translation']) && $item['translation'])) {
                                render_flag_option();
                            }
                            $default_field = get_option_default_fields();
                            $current_options = [];
                        ?>
                        <div class="row">
                        <?php $__currentLoopData = $val['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_key => $_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $_val = array_merge( $default_field, $_val );
                                if(isset($serviceData[$_val['id']])){
                                    $_val['value'] = $serviceData[$_val['id']];
                                }
                                if($_val['type'] == 'location'){
                                    $_val['value'] = [
                                        'lat' => $serviceData['location_lat'],
                                        'lng' => $serviceData['location_lng'],
                                        'address' => $serviceData['location_address'],
                                        'zoom' => $serviceData['location_zoom'],
                                        'postcode' => $serviceData['location_postcode'],
                                        'country' => $serviceData['location_country'],
                                        'city' => $serviceData['location_city'],
                                        'state' => $serviceData['location_state']
                                    ];
                                }
                                if($_val['type'] == 'list_item'){
                                    $data = [];
                                    if(isset($serviceData[$_val['id']])){
                                        $data = $serviceData[$_val['id']];
                                    }
                                    $data = maybe_unserialize($data);
                                    $_val['value'] = $data;
                                }

                                if($_val['type'] == 'checkbox'){
                                    $data = isset($serviceData[$_val['id']]) ? $serviceData[$_val['id']] : '';
                                    if(!empty($data)){
                                        $data = explode(',', $data);
                                    }else{
                                        $data = [];
                                    }
                                    $_val['value'] = $data;
                                }

                                if($_val['type'] == 'term_price'){
                                    $data = $serviceData[$_val['id']];
                                    $data = maybe_unserialize($data);
                                    $_val['value'] = $data;
                                }
                                if($_val['type'] == 'custom_price'){
                                    $_val['post_id'] = $serviceData['id'];
                                    $_val['post_type'] = $serviceData['post_type'];
                                }

                                // dd( $_val);
                            ?>

                                <?php echo $__env->make('Backend::settings.fields.render', [
                                    'field' => $_val
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php
                                $current_options[] = $_val;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php app('eventy')->action('gmz_' . $serviceData['post_type'] . '_' . $key . '_meta_tab', $serviceData); ?>
                        </div>
                        <input type="hidden" name="current_options" value="<?php echo e(base64_encode(json_encode($current_options))); ?>" />
                    </form>
                </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/settings/meta.blade.php ENDPATH**/ ?>