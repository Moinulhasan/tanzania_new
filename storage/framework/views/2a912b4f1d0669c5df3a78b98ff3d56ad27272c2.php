

<?php $__env->startSection('title', __('Dashboard')); ?>

<?php
    admin_enqueue_styles([
        'apexcharts',
        'flatpickr',
        'modules-widgets',
    ]);
    admin_enqueue_scripts([
        'apexcharts',
        'flatpickr',
        'gmz-widget'
    ]);
    $user_id = get_current_user_id();
?>

<?php $__env->startSection('content'); ?>

    <h5 class="mt-4 mb-4"><?php echo e(__('Dashboard')); ?></h5>

    <div class="row layout-top-spacing sales">

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <!--widgetTotalOrders-->
            <div class="getWidget d-none"
                 data-action="<?php echo e(dashboard_url('get-widget')); ?>"
                 data-widget="widgetTotalOrders"
                 data-id="<?php echo e($user_id); ?>">
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <!--widgetTotalEarnings-->
            <div class="getWidget d-none"
                 data-action="<?php echo e(dashboard_url('get-widget')); ?>"
                 data-widget="widgetTotalEarnings"
                 data-id="<?php echo e($user_id); ?>">
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <!--widgetTotalCommission-->
            <div class="getWidget d-none"
                 data-action="<?php echo e(dashboard_url('get-widget')); ?>"
                 data-widget="widgetTotalCommission"
                 data-id="<?php echo e($user_id); ?>">
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <!--widgetTotalCommission-->
            <div class="getWidget d-none"
                 data-action="<?php echo e(dashboard_url('get-widget')); ?>"
                 data-widget="widgetPendingTask"
                 data-id="<?php echo e($user_id); ?>">
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Backend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/dashboard/index.blade.php ENDPATH**/ ?>