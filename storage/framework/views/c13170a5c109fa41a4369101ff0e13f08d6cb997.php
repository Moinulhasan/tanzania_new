

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
                            <h4 class="mb-0"><?php echo e(__('Title Menu')); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <label for="menuName">Menu Options</label>
                    <select name="menu" id="menuName" class="form-control">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $listMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($menu->id); ?>" <?php echo e($menu_id == $menu->id ?'selected':''); ?>> <?php echo e($menu->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Backend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/menu/title_menu.blade.php ENDPATH**/ ?>