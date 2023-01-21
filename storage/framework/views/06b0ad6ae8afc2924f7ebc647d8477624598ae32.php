<?php
    $post_data = request()->get('hotel_star', '');
    if(!empty($post_data)){
        $post_data = explode(',', $post_data);
    }else{
        $post_data = [];
    }
?>
<div class="filter-item star">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fal fa-star"></i> <?php echo e(__('Star')); ?>

        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php for($s = 5; $s > 0; $s--): ?>
                <div class="star-item">
                    <label class="checkbox-inline">
                        <input type="checkbox" class="gmz-checkbox-item" name="hotel_star[]" value="<?php echo e($s); ?>" <?php if(in_array($s, $post_data)): ?> checked <?php endif; ?>>
                        <span></span>
                        <?php for($i = 1; $i <= $s; $i++): ?>
                            <i class="fas fa-star"></i>
                        <?php endfor; ?>
                    </label>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/filter/star.blade.php ENDPATH**/ ?>