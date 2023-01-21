

<?php $__env->startSection('title', __('My Orders')); ?>

<?php
    admin_enqueue_styles([
        'gmz-datatables',
        'gmz-dt-global',
        'gmz-dt-multiple-tables',
        'footable'
    ]);
    admin_enqueue_scripts([
       'gmz-datatables',
       'gmz-table',
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
                            <h4><?php echo e(__('My Orders')); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive mb-4 mt-4">
                <?php
                    $current_url = dashboard_url('my-orders?');
                ?>
                <?php if($allPosts->total() > 0): ?>
                    <table id="gmz_table" class="multi-table table table-striped table-bordered table-hover non-hover overflow-hidden w-100" data-plugin="footable">
                        <thead>
                        <tr>
                            <th width="90px" style="min-width: 90px" data-breakpoints="xs">
                                <a class="table-sort" href="<?php echo e($current_url . build_query_sort('id')); ?>">
                                    <span><?php echo e(__('ID')); ?></span>
                                    <span class="icon-sort">
                                        <?php echo get_icon_sort('id'); ?>

                                    </span>
                                </a>
                            </th>
                            <th><?php echo e(__('Service')); ?></th>
                            <th data-breakpoints="xs sm md">
                                <a class="table-sort "  href="<?php echo e($current_url . build_query_sort('start_date')); ?>">
                                    <span><?php echo e(__('Booking')); ?></span>
                                    <span class="icon-sort bs-tooltip bs-tooltip-sm" title="<?php echo e(__("sort by start date")); ?>">
                                        <?php echo get_icon_sort('start_date'); ?>

                                    </span>
                                </a>
                            </th>
                            <th><?php echo e(__('Total')); ?></th>
                            <th data-breakpoints="xs">
                                <a class="table-sort"  href="<?php echo e($current_url . build_query_sort('status')); ?>">
                                    <span><?php echo e(__('Status')); ?></span>
                                    <span class="icon-sort">
                                        <?php echo get_icon_sort('status'); ?>

                                    </span>
                                </a>
                            </th>
                            <th data-breakpoints="xs sm md">
                                <a class="table-sort" href="<?php echo e($current_url . build_query_sort('updated_at')); ?>">
                                    <span><?php echo e(__('Date')); ?></span>
                                    <span class="icon-sort">
                                        <?php echo get_icon_sort('updated_at'); ?>

                                    </span>
                                </a>
                            </th>
                            <th data-breakpoints="xs">
                                <?php echo e(__('Action')); ?>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $allPosts->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $data = json_decode($item['checkout_data'], true);
                                $postData = [];
                                $postIds = [];
                                if ($data['post_id'] == 0 && !empty($data['service'])){
                                    $postIds = explode(',', $data['service']);
                                }else{
                                    $postIds[] = $data['post_id'];
                                }
                                foreach ($postIds as $s){
                                    $post = get_post($s, $item['post_type']);
                                    $postData[] = [
                                        'title' => get_translate($post['post_title']),
                                        'url' => get_the_permalink($post['post_slug'], $data['post_type'])
                                    ];
                                }
                            ?>
                            <?php if($postData): ?>
                            <tr>
                                <td>
                                    #<?php echo e($item['id']); ?>

                                </td>
                                <td>
                                    <span class="order-posttype <?php echo e($data['post_type']); ?>"><?php echo e(ucfirst($data['post_type'])); ?></span>
                                    <strong class="mb-1 clearfix mt-05">
                                        <?php $__currentLoopData = $postData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($loop->index > 0): ?>
                                                <span>/</span>
                                            <?php endif; ?>
                                            <a href="<?php echo e($p['url']); ?>"><?php echo e($p['title']); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </strong>
                                </td>
                                <td>
                                    <?php if($item['post_type'] == GMZ_SERVICE_BEAUTY): ?>
                                        <span><?php echo e(date(get_date_format(), $data['cart_data']['check_in'])); ?></span>
                                        <br />
                                        <span><?php echo e(date(get_time_format(), $data['cart_data']['check_in'])); ?></span>
                                    <?php else: ?>
                                        <span><?php echo e(date(get_date_format(), $item['start_date'])); ?></span>
                                        <?php echo e(__('to')); ?>

                                        <span><?php echo e(date(get_date_format(), $item['end_date'])); ?></span>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php echo e(convert_price($item['total'])); ?>

                                </td>
                                
                                <td class="td-status" data-status="<?php echo e($item['status']); ?>" data-payment-type="<?php echo e($item['payment_type']); ?>">
                                    <span class="order-status"><?php echo the_order_status($item['status']); ?></span>
                                    <span class="order-payment d-block mt-2">
                                        <small>(<?php echo e(get_payment_type($item['payment_type'])); ?>)</small>
                                    </span>
                                </td>
                                
                                <td><?php echo e(date(get_date_format(true), strtotime($item['updated_at']))); ?></td>
                                
                                <td>
                                    <?php
                                        $params['orderID'] = $item['id'];
                                        $params['orderHashing'] = gmz_hashing($item['id']);
                                    ?>
                                    <a class="gmz-open-modal btn btn-warning btn-sm w-100" href="javascript:void(0);" data-target="#gmzOrderDetailModal" data-action="<?php echo e(dashboard_url('get-order-detail')); ?>" data-params="<?php echo e(base64_encode(json_encode($params))); ?>"><?php echo e(__('Detail')); ?></a>
                                    <?php app('eventy')->action('gmz_my_order_actions', $item); ?>
                                </td>

                            </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <div class="gmz-pagination">
                        <?php echo $allPosts->withQueryString()->links(); ?>

                    </div>

                <?php else: ?>
                    <div class="alert alert-warning"><?php echo e(__('No data')); ?></div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    
    <?php echo $__env->make('Backend::components.modal.order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Backend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/screens/admin/order/history.blade.php ENDPATH**/ ?>