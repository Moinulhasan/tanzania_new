

<?php $__env->startSection('title', $title); ?>

<?php
    admin_enqueue_styles('gmz-steps');
    admin_enqueue_scripts('gmz-steps');
    admin_enqueue_styles('gmz-custom-tab');
?>

<?php $__env->startSection('content'); ?>

    <div class="layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0"><?php echo e($title); ?></h4>
                                <?php if(!$new): ?>
                                    <?php
                                        if($serviceData['status'] == 'pending'){
                                            $class_status = 'text-warning';
                                        }elseif($serviceData['status'] == 'draft'){
                                            $class_status = 'text-danger';
                                        }else{
                                            $class_status = 'text-success';
                                        }
                                    ?>
                                    <p class="mb-0 <?php echo e($class_status); ?> ml-1">(<?php echo e(ucfirst($serviceData['status'])); ?>)</p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <a href="<?php echo e(dashboard_url('all-rooms?hotel_id='. $serviceData['id'])); ?>" class="btn btn-warning btn-sm"><?php echo e(__('Manage Rooms')); ?></a>
                                <a href="<?php echo e(get_hotel_permalink($serviceData['post_slug'])); ?>" id="post-preview" class="btn btn-primary btn-sm" target="_blank"><?php echo e(__('Preview')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <?php echo $__env->make('Backend::settings.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <?php
            $post_type = GMZ_SERVICE_HOTEL;
        ?>
        <?php echo $__env->make('Backend::screens.admin.seo.components.append', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Backend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/screens/admin/services/hotel/edit.blade.php ENDPATH**/ ?>