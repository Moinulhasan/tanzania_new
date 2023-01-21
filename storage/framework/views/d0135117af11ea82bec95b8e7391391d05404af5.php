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
       $price_range = get_price_range('apartment');
       $apartment_types = get_terms('name','apartment-type');
       $apartment_amenity = get_terms('name','apartment-amenity');
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
   $checkInTime = request()->get('checkInTime', '');
   $checkOutTime = request()->get('checkOutTime', '');
   $checkInOutTime = request()->get('checkInOutTime', '');
   $startTime = request()->get('startTime', '');
   $endTime = request()->get('endTime', '');
   $bookingType = request()->get('bookingType', 'day');

   $adult = (int)request()->get('adult', 1);
   $children = (int)request()->get('children', 0);
   $infant = (int)request()->get('infant', 0);
?>
<form id="search-apartment" method="GET" class="search-form apartment" action="<?php echo e(url('apartment-search')); ?>">
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
        <input type="text" class="input-hidden check-in-out-time-field align-self-end" name="checkInOutTime" value="<?php echo e($checkInOutTime); ?>">
        <input type="text" class="input-hidden check-in-time-field"
               name="checkInTime" value="<?php echo e($checkInTime); ?>">
        <input type="text" class="input-hidden check-out-time-field"
               name="checkOutTime" value="<?php echo e($checkOutTime); ?>">
        <div class="search-form__from-time time-group <?php if($bookingType == 'day'): ?> d-none <?php endif; ?>">
            <i class="fal fa-calendar-alt"></i>
            <span class="check-in-time-render" data-date-format="<?php echo e(get_date_format_moment()); ?>">
                <?php if(!empty($checkInTime)): ?>
                    <?php echo e(date(get_date_format(), strtotime($checkInTime))); ?>

                <?php else: ?>
                    <?php echo e(__('Date')); ?>

                <?php endif; ?>
            </span>
        </div>

        <div class="search-form__time time-group <?php if($bookingType == 'day'): ?> d-none <?php endif; ?>">
            <div class="dropdown">
                <div class="dropdown-toggle" id="dropdownTimeButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fal fa-clock"></i>
                    <span class="time-render">
                        <?php
                            $time_str = __('Time');
                            if(!empty($startTime) && !empty($endTime)){
                                $startTimeTemp = $startTime;
                                $endTimeTemp = $endTime;
                                if($startTimeTemp == '12:00 AM'){
                                    $startTimeTemp = '00:00 AM';
                                }
                                if($endTimeTemp == '12:00 AM'){
                                    $endTimeTemp = '00:00 AM';
                                }
                                $time_str = $startTimeTemp . ' - ' . $endTimeTemp;
                            }
                        ?>
                        <?php echo e($time_str); ?>

                    </span>
                </div>
                <?php
                    $list_times = get_list_time();
                ?>
                <div class="dropdown-menu" aria-labelledby="dropdownTimeButton">
                    <div class="item start-time d-flex align-items-center justify-content-between">
                        <div class="label"><?php echo e(__('Start Time')); ?></div>
                        <div class="value">
                            <select class="form-control" name="startTime">
                                <?php $__currentLoopData = $list_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktime => $vtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ktime); ?>" <?php echo e(selected($ktime, $startTime)); ?>><?php echo e($vtime); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="item end-time d-flex align-items-center justify-content-between">
                        <div class="label"><?php echo e(__('End Time')); ?></div>
                        <div class="value">
                            <select class="form-control" name="endTime">
                                <?php if(!empty($startTime) && !empty($endTime)): ?>
                                    <?php $__currentLoopData = $list_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktime => $vtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ktime); ?>" <?php echo e(selected($ktime, $endTime)); ?>><?php echo e($vtime); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="">---------- </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End for time-->

        <input type="text" class="input-hidden check-in-out-field align-self-end"
               name="checkInOut" value="<?php echo e($checkInOut); ?>" data-same-date="false">
        <input type="text" class="input-hidden check-in-field"
               name="checkIn" value="<?php echo e($checkIn); ?>">
        <input type="text" class="input-hidden check-out-field"
               name="checkOut" value="<?php echo e($checkOut); ?>">
        <div class="search-form__from date-group <?php if($bookingType == 'hour'): ?> d-none <?php endif; ?>">
            <i class="fal fa-calendar-alt"></i>
            <span class="check-in-render" data-date-format="<?php echo e(get_date_format_moment()); ?>">
                <?php if(!empty($checkIn)): ?>
                    <?php echo e(date(get_date_format(), strtotime($checkIn))); ?>

                <?php else: ?>
                    <?php echo e(__('Check In')); ?>

                <?php endif; ?>
            </span>
        </div>
        <div class="search-form__to date-group <?php if($bookingType == 'hour'): ?> d-none <?php endif; ?>">
            <i class="fal fa-calendar-alt"></i>
            <span class="check-out-render" data-date-format="<?php echo e(get_date_format_moment()); ?>">
                <?php if(!empty($checkOut)): ?>
                    <?php echo e(date(get_date_format(), strtotime($checkOut))); ?>

                <?php else: ?>
                    <?php echo e(__('Check Out')); ?>

                <?php endif; ?>
            </span>
        </div>

        <div class="search-form__guest apartment">
            <div class="dropdown">
                <div class="dropdown-toggle" id="dropdownGuestButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fal fa-users"></i>
                    <span class="guest-render">
                        <?php
                            $guests = $adult + $children;
                            $str_guest = sprintf(_n(__('%s Guest'), __('%s Guests'), $guests), $guests);
                            if($infant > 0){
                                $str_guest .= sprintf(_n(__(', %s Infant'), __(', %s Infants'), $infant), $infant);
                            }
                        ?>
                        <?php echo e($str_guest); ?>

                    </span>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownGuestButton">
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

                    <div class="item d-flex align-items-center justify-content-between">
                        <div class="label"><?php echo e(__('Infants')); ?></div>
                        <div class="value">
                            <select class="form-control" name="infant">
                                <?php for($i = 0; $i <= 20; $i++): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e(selected($i, $infant)); ?>><?php echo e($i); ?></option>
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
                    <?php if(!empty($apartment_types)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Types')); ?></div>
                            <?php $__currentLoopData = $apartment_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="apartment_types[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($type)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="apartment_type" value=""/>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($apartment_amenity)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Amenities')); ?></div>
                            <?php $__currentLoopData = $apartment_amenity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="apartment_amenities[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($value)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="apartment_amenity" value=""/>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</form><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/apartment/search-form.blade.php ENDPATH**/ ?>