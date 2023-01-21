<?php
    if (empty($data)){
       return false;
    }

?>
<div class="widget-one gmz-bg-orange" id="widgetTotalCommission" data-json="<?php echo e(json_encode($data["data_chart"])); ?>" data-name="<?php echo e(__('Sales')); ?>" data-symbol="<?php echo e(json_encode(get_symbol_currency())); ?>">
    <div class="widget-content">
        <div class="w-numeric-value">
            <div class="w-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-percent"><line x1="19" y1="5" x2="5" y2="19"></line><circle cx="6.5" cy="6.5" r="2.5"></circle><circle cx="17.5" cy="17.5" r="2.5"></circle></svg>
            </div>
            <div class="w-content">
                <span class="w-value"><?php echo e(convert_price($data['total'])); ?></span>
                <span class="w-numeric-title"><?php echo e(__('Total Commission')); ?></span>
            </div>
        </div>
        <div class="w-chart">
            <div id="total-commission"></div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/widget/widgetTotalCommission.blade.php ENDPATH**/ ?>