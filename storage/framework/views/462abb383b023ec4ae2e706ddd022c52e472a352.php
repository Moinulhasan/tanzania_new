

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

                <form action="<?php echo e(route('count-edit',$menu_id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
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
                        <div class="mt-3 col-md-8">
                            <label for="count">Enter the Row Count</label>
                            <input type="number" value="<?php echo e(count($single)); ?>" id="count" class="form-control"
                                   name="count">
                        </div>
                        <div class="col-md-8">
                            <div class="mt-3">
                                <label for="">Section Title</label>
                                <div id="Number">
                                    <?php $__currentLoopData = $single; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="text" value="<?php echo e($nw->title); ?>" class="form-control mt-2" name="title[]">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3"> Save</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $('#count').on('keyup click onchange', function () {
            console.log($(this).val());
            $('#Number').append('');
            if ($(this).val() > 0) {
                for ($i = 0; $i < $(this).val(); $i++) {
                    $('#Number').append('<input type="text" value="Enter title"  class="form-control mt-2" name="title[]">');
                }
            }else{
                $('#Number').empty();
            }

            if (!$(this).val()) {
                $('#Number').empty();
            }
            // If user tries to click on the span then trigger the click event manually.

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Backend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/menu/sub_count_edit.blade.php ENDPATH**/ ?>