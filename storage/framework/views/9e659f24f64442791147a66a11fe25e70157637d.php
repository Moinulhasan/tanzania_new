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
       $price_range = get_price_range(GMZ_SERVICE_HOTEL);
       $property_types = get_terms('name','property-type');
       $hotel_facilities = get_terms('name','hotel-facilities');
       $hotel_services = get_terms('name','hotel-services');
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

   $number_room = (int)request()->get('number_room', 1);
   $adult = (int)request()->get('adult', 1);
   $children = (int)request()->get('children', 0);
?>
<form id="search-hotel" method="GET" class="search-form hotel" action="<?php echo e(route('hotel-search')); ?>">
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

        <input type="text" class="input-hidden check-in-out-field align-self-end"
               name="checkInOut" value="<?php echo e($checkInOut); ?>" data-same-date="false">
        <input type="text" class="input-hidden check-in-field"
               name="checkIn" value="<?php echo e($checkIn); ?>">
        <input type="text" class="input-hidden check-out-field"
               name="checkOut" value="<?php echo e($checkOut); ?>">
        <div class="search-form__from date-group">
            <i class="fal fa-calendar-alt"></i>
            <span class="check-in-render" data-date-format="<?php echo e(get_date_format_moment()); ?>">
                <?php if(!empty($checkIn)): ?>
                    <?php echo e(date(get_date_format(), strtotime($checkIn))); ?>

                <?php else: ?>
                    <?php echo e(__('Check In')); ?>

                <?php endif; ?>
            </span>
        </div>
        <div class="search-form__to date-group">
            <i class="fal fa-calendar-alt"></i>
            <span class="check-out-render" data-date-format="<?php echo e(get_date_format_moment()); ?>">
                <?php if(!empty($checkOut)): ?>
                    <?php echo e(date(get_date_format(), strtotime($checkOut))); ?>

                <?php else: ?>
                    <?php echo e(__('Check Out')); ?>

                <?php endif; ?>
            </span>
        </div>

        <div class="search-form__guest hotel">
            <div class="dropdown">
                <div class="dropdown-toggle" id="dropdownGuestButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fal fa-users"></i>
                    <span class="guest-render">
                        <?php
                            $str_guest = sprintf(_n(__('%s Adult'), __('%s Adults'), $adult), $adult);
                            if($children > 0){
                                $str_guest .= sprintf(__(', %s Children'), $children);
                            }
                        ?>
                        <?php echo e($str_guest); ?>

                    </span>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownGuestButton">
                    <div class="item d-flex align-items-center justify-content-between">
                        <div class="label"><?php echo e(__('Rooms')); ?></div>
                        <div class="value">
                            <select class="form-control" name="number_room">
                                <?php for($i = 1; $i <= 20; $i++): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e(selected($i, $number_room)); ?>><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="item d-flex align-items-center justify-content-between">
                        <div class="label"><?php echo e(__('Adults')); ?></div>
                        <div class="value">
                            <select class="form-control" name="adult">
                                <?php for($i = 1; $i <= 20; $i++): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e(selected($i, $adult)); ?>><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="item d-flex align-items-center justify-content-between">
                        <div class="label"><?php echo e(__('Children')); ?></div>
                        <div class="value">
                            <select class="form-control" name="children">
                                <?php for($i = 0; $i <= 20; $i++): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e(selected($i, $children)); ?>><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>

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
                    <div class="col-md-6 mb-2">
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
                    <?php if(!empty($property_types)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper mb-2">
                            <div class="search-form__label"><?php echo e(__('Property Types')); ?></div>
                            <?php $__currentLoopData = $property_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="gmz-checkbox-item" name="property_types[]" value="<?php echo e($key); ?>">
                                    <span><?php echo e(get_translate($type)); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="property_type" value=""/>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($hotel_facilities)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Facilities')); ?></div>
                            <?php $__currentLoopData = $hotel_facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="gmz-checkbox-item" name="hotel_facilitiess[]" value="<?php echo e($key); ?>">
                                    <span><?php echo e(get_translate($value)); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="hotel_facilities" value=""/>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($hotel_services)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Services')); ?></div>
                            <?php $__currentLoopData = $hotel_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="hotel_servicess[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($value)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="hotel_services" value=""/>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</form><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/hotel/search-form.blade.php ENDPATH**/ ?>