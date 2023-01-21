<?php
    if(empty($data)){
        return false;
    }
    $task = $data['task'];
    $link = $data['link'];

?>
<div class="widget widget-five">
    <div class="widget-content">

        <div class="header">
            <div class="header-body">
                <h6><?php echo e(__("Pending Tasks")); ?></h6>
                <p class="meta-date"></p>
            </div>
            <div class="task-action">
                <div class="dropdown  custom-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                        <a class="dropdown-item" href="<?php echo e($link['refund']); ?>"><?php echo e(__('View orders need refund')); ?></a>
                        <a class="dropdown-item" href="<?php echo e($link['confirm']); ?>"><?php echo e(__('view orders need confirmation')); ?></a>
                        <a class="dropdown-item" href="<?php echo e($link['withdrawal']); ?>"><?php echo e(__('view pending withdrawal')); ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-content">
            <div class="">
                <p class="task-left"><?php echo e($task['total']); ?></p>
                <p class="task-completed"><span><?php echo e($task['order_refund']); ?> <?php echo e(__('Orders need refund')); ?></span></p>
                <p class="task-hight-priority mb-1"><span><?php echo e($task['order_confirm']); ?> <?php echo e(__('Orders need confirmation')); ?></span></p>
                <p class="text-dark mb-0"><span><?php echo e($task['withdrawal_pending']); ?> <?php echo e(__('Pending withdrawal')); ?></span></p>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/screens/admin/widget/widgetPendingTask.blade.php ENDPATH**/ ?>