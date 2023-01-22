<?php if(is_seo_enable()): ?>
    <?php
        $options = get_seo_content_config('single_' . $post_type);
    ?>
    <?php if(isset($options['seo_enable']) && $options['seo_enable'] == 'on'): ?>
        <?php
            $page_id = $post_type;
            $data_temp = [
                'seo_title' => isset($serviceData['seo']['seo_title']) ? $serviceData['seo']['seo_title'] : '',
                'meta_description' => isset($serviceData['seo']['meta_description']) ? $serviceData['seo']['meta_description'] : '',
                'seo_image_facebook' => isset($serviceData['seo']['seo_image_facebook']) ? $serviceData['seo']['seo_image_facebook'] : '',
                'seo_title_facebook' => isset($serviceData['seo']['seo_title_facebook']) ? $serviceData['seo']['seo_title_facebook'] : '',
                'meta_description_facebook' => isset($serviceData['seo']['meta_description_facebook']) ? $serviceData['seo']['meta_description_facebook'] : '',
                'seo_image_twitter' => isset($serviceData['seo']['seo_image_twitter']) ? $serviceData['seo']['seo_image_twitter'] : '',
                'seo_title_twitter' => isset($serviceData['seo']['seo_title_twitter']) ? $serviceData['seo']['seo_title_twitter'] : '',
                'meta_description_twitter' => isset($serviceData['seo']['meta_description_twitter']) ? $serviceData['seo']['meta_description_twitter'] : '',
            ];
        ?>
        <div class="statbox widget box box-shadow mt-3">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4><?php echo e(__('SEO Options')); ?></h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area pl-2 pr-2">
                <?php echo $__env->make('Backend::screens.admin.seo.components.variable', ['is_content_type' => true, 'variable_type' => 'content'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php
                    $seo_fields = admin_config('content', 'seo');
                ?>
                <form class="gmz-form-action form-translation" action="<?php echo e(dashboard_url('seo-single-save-settings')); ?>" method="POST" data-loader="body" enctype="multipart/form-data">
                    <input type="hidden" name="post_id" value="<?php echo e($serviceData['id']); ?>" />
                    <input type="hidden" name="post_id_hashing" value="<?php echo e(gmz_hashing($serviceData['id'])); ?>" />
                    <input type="hidden" name="post_type" value="<?php echo e($post_type); ?>" />
                    <input type="hidden" name="post_type_hashing" value="<?php echo e(gmz_hashing($post_type)); ?>" />
                    <?php echo $__env->make('Backend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <ul class="nav nav-tabs mt-3" id="seo-<?php echo e($post_type); ?>-tabs" role="tablist">
                        <li class="nav-item mb-0">
                            <a class="nav-link active" id="seo-<?php echo e($post_type); ?>-tab" data-toggle="tab" href="#seo-<?php echo e($post_type); ?>" role="tab" aria-controls="seo-<?php echo e($post_type); ?>" aria-selected="true"><i class="fas fa-cubes"></i> <?php echo e(__('General')); ?></a>
                        </li>
                        <li class="nav-item mb-0">
                            <a class="nav-link" id="seo-facebook-<?php echo e($post_type); ?>-tab" data-toggle="tab" href="#seo-facebook-<?php echo e($post_type); ?>" role="tab" aria-controls="seo-facebook-<?php echo e($post_type); ?>" aria-selected="false"><i class="fab fa-facebook"></i> <?php echo e(__('Facebook')); ?></a>
                        </li>
                        <li class="nav-item mb-0">
                            <a class="nav-link" id="seo-twitter-<?php echo e($post_type); ?>-tab" data-toggle="tab" href="#seo-twitter-<?php echo e($post_type); ?>" role="tab" aria-controls="seo-twitter-<?php echo e($post_type); ?>" aria-selected="false"><i class="fab fa-twitter"></i> <?php echo e(__('Twitter')); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="seo-tabsContent">
                        <div class="tab-pane fade show active" id="seo-<?php echo e($post_type); ?>" role="tabpanel" aria-labelledby="seo-<?php echo e($post_type); ?>-tab">
                            <div class="mt-4">
                                <?php $fields = $seo_fields['fields']['general']; ?>
                                <?php echo $__env->make('Backend::settings.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seo-facebook-<?php echo e($post_type); ?>" role="tabpanel" aria-labelledby="seo-facebook-<?php echo e($post_type); ?>-tab">
                            <div class="mt-4">
                                <?php $fields = $seo_fields['fields']['facebook']; ?>
                                <?php echo $__env->make('Backend::settings.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seo-twitter-<?php echo e($post_type); ?>" role="tabpanel" aria-labelledby="seo-twitter-<?php echo e($post_type); ?>-tab">
                            <div class="mt-4">
                                <?php $fields = $seo_fields['fields']['twitter']; ?>
                                <?php echo $__env->make('Backend::settings.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                </form>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/seo/components/append.blade.php ENDPATH**/ ?>