    

<?php $__env->startSection('title', __('All Hotels')); ?>

<?php
    admin_enqueue_styles([
        'gmz-datatables',
        'gmz-dt-global',
        'gmz-dt-multiple-tables',
        'footable'
    ]);
    admin_enqueue_scripts([
        'gmz-datatables',
        'footable'
    ]);
?>

<?php $__env->startSection('content'); ?>

    <div class="layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4><?php echo e(__('All Hotels')); ?></h4>
                            <a href="<?php echo e(dashboard_url('new-hotel')); ?>" class="btn btn-success"><?php echo e(__('Add New')); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php get_filter_status('hotel'); ?>

            <div class="table-responsive mb-4 mt-4">
                <?php if($allPosts->total() > 0): ?>
                <table class="multi-table table table-striped table-bordered table-hover non-hover w-100" data-plugin="footable">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Name')); ?></th>
                        <th data-breakpoints="xs sm md"><?php echo e(__('Type')); ?></th>
                        <th data-breakpoints="xs sm"><?php echo e(__('Price')); ?></th>
                        <th data-breakpoints="xs"><?php echo e(__('Status')); ?></th>
                        <th class="text-center"><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $allPosts->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $post_title = get_translate($item->post_title);
                            $params = [
                                'postID' => $item->id,
                                'postHashing' => gmz_hashing($item->id)
                            ];
                        ?>
                    <tr>
                        <td class="d-flex align-items-center">
                            <?php if(!empty($item->thumbnail_id)): ?>
                                <?php
                                    $img = get_attachment_url($item->thumbnail_id, [50, 50]);
                                ?>
                                <?php if(!empty($img)): ?>
                                    <a href="<?php echo e(get_hotel_permalink($item['post_slug'])); ?>" target="_blank">
                                    <img src="<?php echo e($img); ?>" class="img-fluid mr-2 mw-5" alt="<?php echo e($post_title); ?>" />
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div>
                                <h6 class="mb-0"><a href="<?php echo e(get_hotel_permalink($item['post_slug'])); ?>" target="_blank"><?php echo e($post_title); ?></a></h6>
                                <div class="quick-action">
                                    <?php
                                        $status = request()->get('status', '');
                                    ?>
                                    <?php if($status == 'trash'): ?>
                                        <a class="gmz-link-action" href="javascript:void(0);" data-action="<?php echo e(dashboard_url('restore-hotel')); ?>" data-params="<?php echo e(base64_encode(json_encode($params))); ?>" data-remove-el="tr"><?php echo e(__('Restore')); ?></a>
                                        <a class="text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="<?php echo e(dashboard_url('hard-delete-hotel')); ?>" data-params="<?php echo e(base64_encode(json_encode($params))); ?>" data-remove-el="tr"><?php echo e(__('Delete Permanently')); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(dashboard_url('edit-hotel/' . $item->id)); ?>"><?php echo e(__('Edit')); ?></a>
                                        <a class="text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="<?php echo e(dashboard_url('delete-hotel')); ?>" data-params="<?php echo e(base64_encode(json_encode($params))); ?>" data-remove-el="tr"><?php echo e(__('Delete')); ?></a>
                                        <a href="<?php echo e(get_hotel_permalink($item->post_slug)); ?>"><?php echo e(__('View')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                                $type = $item['property_type'];
                                $term = get_term('id', $type);
                                if($term){
                                    echo get_translate($term->term_title);
                                }else{
                                    echo '---';
                                }
                            ?>
                        </td>
                        <td><?php echo e(convert_price($item['base_price'])); ?></td>
                        <td><?php echo e(ucfirst($item->status)); ?></td>
                        <td class="text-center">
                            <div class="dropdown custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <?php if($status == 'trash'): ?>
                                        <a class="dropdown-item gmz-link-action text-info" href="javascript:void(0);" data-action="<?php echo e(dashboard_url('restore-hotel')); ?>" data-params="<?php echo e(base64_encode(json_encode($params))); ?>" data-remove-el="tr"><?php echo e(__('Restore')); ?></a>
                                        <a class="dropdown-item text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="<?php echo e(dashboard_url('hard-delete-hotel')); ?>" data-params="<?php echo e(base64_encode(json_encode($params))); ?>" data-remove-el="tr"><?php echo e(__('Delete Permanently')); ?></a>
                                    <?php else: ?>
                                        <a class="dropdown-item" href="<?php echo e(get_hotel_permalink($item['post_slug'])); ?>" target="_blank"><?php echo e(__('View')); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(dashboard_url('edit-hotel/' . $item->id)); ?>"><?php echo e(__('Edit')); ?></a>
                                        <?php
                                            $paramsTemp = $params;
                                            $paramsTemp['status'] = $item->status;
                                        ?>
                                        <?php $__currentLoopData = list_service_status($item->status); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $paramsTemp = $params;
                                                $paramsTemp['statusTo'] = $status;
                                            ?>
                                            <a class="dropdown-item gmz-link-action text-warning" href="javascript:void(0);" data-action="<?php echo e(dashboard_url('change-hotel-status')); ?>" data-params="<?php echo e(base64_encode(json_encode($paramsTemp))); ?>"><?php echo e($title); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <a class="dropdown-item text-info" href="<?php echo e(dashboard_url('all-rooms?hotel_id='. $item->id)); ?>"><?php echo e(__('Manage Rooms')); ?></a>
                                        <a class="dropdown-item text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="<?php echo e(dashboard_url('delete-hotel')); ?>" data-params="<?php echo e(base64_encode(json_encode($params))); ?>" data-remove-el="tr"><?php echo e(__('Delete')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <div class="gmz-pagination">
                    <?php echo $allPosts->links(); ?>

                </div>

                <?php else: ?>
                    <div class="alert alert-warning"><?php echo e(__('No data')); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Backend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/services/hotel/all.blade.php ENDPATH**/ ?>