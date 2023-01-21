<?php
    $has_advanced = true;
    if(isset($advanced) && !$advanced){
        $has_advanced = false;
    }

    enqueue_styles([
        'mapbox-gl',
        'mapbox-gl-geocoder',
        'select2'
     ]);
     enqueue_scripts([
        'mapbox-gl',
        'mapbox-gl-geocoder',
        'select2'
     ]);

    $address = request()->get('address', '');
    $lat = request()->get('lat', '');
    $lng = request()->get('lng', '');
    $checkInTime = request()->get('checkIn', '');
    $checkInOutTime = request()->get('checkInOutTime', '');
    $serviceInput = request()->get('service', '');
?>
<form id="search-beauty" method="GET" class="search-form beauty" action="<?php echo e(url('beauty-search')); ?>">
    <div class="search-form__basic">
        <div class="search-form__address">
            <i class="fal fa-city"></i>
            <div class="form-control h-100 border-0" data-plugin="mapbox-geocoder" data-value="<?php echo e($address); ?>"
                 data-placeholder="<?php echo e(__('Location')); ?>" data-lang="<?php echo e(get_current_language()); ?>">
            </div>
            <div class="map d-none"></div>
            <input type="hidden" name="lat" value="<?php echo e($lat); ?>">
            <input type="hidden" name="lng" value="<?php echo e($lng); ?>">
            <input type="hidden" name="address" value="<?php echo e($address); ?>">
        </div>

        <!--For time-->
        <input type="text" class="input-hidden check-in-out-time-field align-self-end" name="checkInOut"
               value="<?php echo e($checkInOutTime); ?>" disabled>
        <input type="text" class="input-hidden check-in-time-field"
               name="checkIn" value="<?php echo e($checkInTime); ?>">
        <div class="search-form__from-time time-group">
            <i class="fal fa-calendar-alt"></i>
            <span class="check-in-time-render" data-date-format="<?php echo e(get_date_format_moment()); ?>">
                <?php if(!empty($checkInTime)): ?>
                    <?php echo e(date(get_date_format(), strtotime($checkInTime))); ?>

                <?php else: ?>
                    <?php echo e(__('Date')); ?>

                <?php endif; ?>
            </span>
        </div>
        <!--End for time-->

        <div class="search-form__select search-form__select--beauty">
           <i class="fal fa-spa"></i>
           <?php $services = get_terms('name', 'beauty-services');?>

            <select class="gmz-select-2 gmz-select-2--beauty-service d-none" name="service" id="beauty-service">
                <option value="-1"><?php echo e(__("All Services")); ?></option>
                <?php if($services): ?>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php if($id == $serviceInput): ?> selected <?php endif; ?>><?php echo e(get_translate($service)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
        </div>
        <button class="btn btn-primary search-form__search" type="submit"><i class="fal fa-search"></i><?php echo e(__('Search')); ?>

        </button>
    </div>
</form><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/beauty/search-form.blade.php ENDPATH**/ ?>