<?php
    if (empty($data)){
       return false;
    }
?>
<div class="widget-one gmz-bg-red" id="widgetTotalEarnings" data-json="<?php echo e(json_encode($data["data_chart"])); ?>" data-name="<?php echo e(__('Sales')); ?>" data-symbol="<?php echo e(json_encode(get_symbol_currency())); ?>">
    <div class="widget-content">
        <div class="w-numeric-value">
            <div class="w-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
            </div>
            <div class="w-content">
                <span class="w-value"><?php echo e(convert_price($data['total'])); ?></span>
                <span class="w-numeric-title"><?php echo e(__('Total Earnings')); ?></span>
            </div>
        </div>
        <div class="w-chart">
            <div id="total-earnings"></div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/screens/admin/widget/widgetTotalEarnings.blade.php ENDPATH**/ ?>