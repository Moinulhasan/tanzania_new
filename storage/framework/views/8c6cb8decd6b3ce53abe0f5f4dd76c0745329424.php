

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
                            <h4><?php echo e(__('New Section')); ?></h4>
                            <a href="<?php echo e(dashboard_url('sub-title-menu')); ?>" class="btn btn-success"><?php echo e(__('Add New')); ?></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="table-responsive mb-4 mt-4">
                <table class="multi-table table table-striped table-bordered table-hover non-hover w-100"
                       data-plugin="footable">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Name')); ?></th>
                        <th data-breakpoints="xs sm md">Total Row</th>
                        <th class="text-center"><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $listMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->menu->name); ?>

                            </td>
                            <td>
                                <?php echo e($item->title); ?>

                            </td>
                            <td class="text-center">
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <a class="dropdown-item"
                                           href="<?php echo e(dashboard_url('sub-count-edit/' . $item->id)); ?>"><?php echo e(__('Edit')); ?></a>

                                        <a class="dropdown-item text-danger gmz-link-action" href="javascript:void(0);"
                                           data-confirm="true" data-action="<?php echo e(dashboard_url('sub-delete')); ?>"
                                           data-params="<?php echo e($item->id); ?>"
                                           data-remove-el="tr"><?php echo e(__('Delete')); ?></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Backend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/screens/admin/menu/submenu_cout.blade.php ENDPATH**/ ?>