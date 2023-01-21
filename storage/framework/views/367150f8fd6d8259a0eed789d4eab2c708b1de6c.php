<?php $__currentLoopData = ['type', 'facilities', 'services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    if($tax == 'type'){
        $terms = get_terms('name','property-' . $tax);
    }else{
        $terms = get_terms('name','hotel-' . $tax);
    }
    $label = '';
    if($tax == 'type'){
        $post_data = request()->get('property_' . $tax);
    }else{
        $post_data = request()->get('hotel_' . $tax);
    }
    if(empty($post_data)){
        $post_data = [];
    }
    if(!empty($post_data)){
        $post_data = explode(',', $post_data);
    }

    if($tax == 'type'){
        $label = __('Types');
    }elseif($tax == 'facilities'){
        $label = __('Facilities');
    }elseif($tax == 'services'){
        $label = __('Services');

}
?>
<div class="filter-item term">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo e($label); ?>

        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php if(!empty($terms)): ?>
                <div class="row gmz-checkbox-wrapper">
                    <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-6">
                            <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="apartment_<?php echo e($tax); ?>ss[]" value="<?php echo e($key); ?>" <?php if(in_array($key, $post_data)): ?> checked <?php endif; ?>><span><?php echo e(get_translate($term)); ?></span></label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($tax == 'type'): ?>
                        <input type="hidden" name="property_<?php echo e($tax); ?>" value=""/>
                    <?php else: ?>
                        <input type="hidden" name="hotel_<?php echo e($tax); ?>" value=""/>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/filter/term.blade.php ENDPATH**/ ?>