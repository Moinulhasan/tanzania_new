

<?php $__env->startSection('title', __('Menu')); ?>

<?php
    admin_enqueue_scripts('jquery-ui');
    admin_enqueue_styles('jquery-ui');
    admin_enqueue_scripts('nested-sort-js');
?>

<?php $__env->startSection('content'); ?>

    <div class="layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="mb-0"><?php echo e(__('Menu')); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mb-4"/>

            <div class="widget-header">
                <?php echo $__env->make('Backend::screens.admin.menu.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-lg-4 gmz-add-menu-box-wrapper">
                        <?php echo $__env->make('Backend::screens.admin.menu.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $__env->make('Backend::screens.admin.menu.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Backend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/screens/admin/menu/index.blade.php ENDPATH**/ ?>