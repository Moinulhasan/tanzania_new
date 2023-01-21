<?php
    $has_advanced = true;
   if(isset($advanced) && !$advanced){
       $has_advanced = false;
   }

   enqueue_styles([
       'mapbox-gl',
       'mapbox-gl-geocoder'
    ]);
    enqueue_scripts([
       'mapbox-gl',
       'mapbox-gl-geocoder'
    ]);

   if($has_advanced){
       $price_range = get_price_range('car');
       $car_types = get_terms('name','car-type');
       $car_features = get_terms('name','car-feature');
       $car_equipments = get_terms('name','car-equipment');
       $extension_range = get_range_extension();

       enqueue_styles([
          'icon.rangeSlider'
       ]);

        enqueue_scripts([
          'icon.rangeSlider'
       ]);
   }

   $address = request()->get('address', '');
   $lat = request()->get('lat', '');
   $lng = request()->get('lng', '');
   $checkIn = request()->get('checkIn', '');
   $checkOut = request()->get('checkOut', '');
   $checkInOut = request()->get('checkInOut', '');
?>
<form id="search-car" method="GET" class="search-form car" action="<?php echo e(url('car-search')); ?>">
    <div class="search-form__basic">
        <div class="search-form__address">
            <i class="fal fa-car-building"></i>
            <div class="form-control h-100 border-0" data-plugin="mapbox-geocoder" data-value="<?php echo e($address); ?>"
                 data-placeholder="<?php echo e(__('Location')); ?>" data-lang="<?php echo e(get_current_language()); ?>">
            </div>
            <div class="map d-none"></div>
            <input type="hidden" name="lat" value="<?php echo e($lat); ?>">
            <input type="hidden" name="lng" value="<?php echo e($lng); ?>">
            <input type="hidden" name="address" value="<?php echo e($address); ?>">
        </div>
        <input type="text" class="input-hidden check-in-out-field align-self-end"
               name="checkInOut" value="<?php echo e($checkInOut); ?>">
        <div class="search-form__from">
            <i class="fal fa-calendar-alt"></i>
            <span class="check-in-render" data-date-format="<?php echo e(get_date_format_moment()); ?>">
                <?php if(!empty($checkIn)): ?>
                    <?php echo e(date(get_date_format(), strtotime($checkIn))); ?>

                <?php else: ?>
                    <?php echo e(__('Pick-up')); ?>

                <?php endif; ?>
            </span>
        </div>
        <div class="search-form__to">
            <i class="fal fa-calendar-alt"></i>
            <span class="check-out-render" data-date-format="<?php echo e(get_date_format_moment()); ?>">
                <?php if(!empty($checkOut)): ?>
                    <?php echo e(date(get_date_format(), strtotime($checkOut))); ?>

                <?php else: ?>
                    <?php echo e(__('Return')); ?>

                <?php endif; ?>
            </span>
        </div>
        <input type="text" class="input-hidden check-in-field"
               name="checkIn" value="<?php echo e($checkIn); ?>">
        <input type="text" class="input-hidden check-out-field"
               name="checkOut" value="<?php echo e($checkOut); ?>">
        <?php if($has_advanced): ?>
            <button class="btn search-form__more" type="button"><i class="fal fa-search-plus"></i></button>
        <?php endif; ?>
        <button class="btn btn-primary search-form__search" type="submit"><i class="fal fa-search"></i><?php echo e(__('Search')); ?>

        </button>
    </div>

    <?php if($has_advanced): ?>
        <div class="search-form__advanced bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="search-form__label"><?php echo e(__('Price')); ?></div>
                        <input type="text" class="price-range-slider" name="price_range" value=""
                               data-min="<?php echo e($price_range['min']); ?>"
                               data-max="<?php echo e($price_range['max']); ?>"
                               data-form="<?php echo e($price_range['from']); ?>"
                               data-to="<?php echo e($price_range['to']); ?>"
                               data-prefix="<?php echo e($extension_range['prefix']); ?>"
                               data-postfix="<?php echo e($extension_range['postfix']); ?>"
                        />

                    </div>
                    <?php if(!empty($car_types)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Types')); ?></div>
                            <?php $__currentLoopData = $car_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="car_types[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($type)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="car_type" value=""/>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($car_features)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Features')); ?></div>
                            <?php $__currentLoopData = $car_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="car_features[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($value)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="car_feature" value=""/>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($car_equipments)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Equipments')); ?></div>
                            <?php $__currentLoopData = $car_equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="car_equipments[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($value)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="car_equipment" value=""/>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
</form><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/car/search-form.blade.php ENDPATH**/ ?>