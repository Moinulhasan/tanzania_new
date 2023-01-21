<?php
    enqueue_styles([
       'icon.rangeSlider'
    ]);

     enqueue_scripts([
       'icon.rangeSlider'
    ]);

    $price_range = get_price_range(GMZ_SERVICE_HOTEL);
    $extension_range = get_range_extension();
?>
<div class="filter-item price">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fal fa-usd-circle"></i> <?php echo e(__('Price')); ?>

        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <input type="text" name="price_range" value=""
                   data-min="<?php echo e($price_range['min']); ?>"
                   data-max="<?php echo e($price_range['max']); ?>"
                   data-from="<?php echo e($price_range['from']); ?>"
                   data-to="<?php echo e($price_range['to']); ?>"
                   data-prefix="<?php echo e($extension_range['prefix']); ?>"
                   data-postfix="<?php echo e($extension_range['postfix']); ?>"
            />
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/filter/price.blade.php ENDPATH**/ ?>