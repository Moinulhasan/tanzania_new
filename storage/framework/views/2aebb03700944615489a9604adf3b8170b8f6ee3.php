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
       $price_range = get_price_range('tour');
       $tour_types = get_terms('name','tour-type');
       $tour_include = get_terms('name','tour-include');
       $tour_exclude = get_terms('name','tour-exclude');
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

   $adult = (int)request()->get('adult', 1);
   $children = (int)request()->get('children', 0);
   $infant = (int)request()->get('infant', 0);
?>

<style>
    .tour-month-select{
        border-radius: 0px !important;
        border: 0px solid #dcdcdc !important;
        box-shadow: none !important;
        padding-left:53px !important;
    }

    @media (max-width:768px){
        .tour-month-select{
        border-radius: 0px !important;
        border: 0px solid #dcdcdc !important;
        box-shadow: none !important;
        padding-left:42px !important;
    }
    }
</style>

<form id="search-tour" method="GET" class="search-form tour" action="<?php echo e(url('tour-search')); ?>">
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
        
        

        

        <div class="search-form__address tour">
            <i class="fal fa-calendar-alt"></i>
            <select class="dropdown form-control tour-month-select" name="month">
                <div class="dropdown-menu" aria-labelledby="dropdownGuestButton">
                        <option value="">Preferred Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                </div>
            </select>
        </div>

        <div class="search-form__guest tour">
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
                    <?php if(!empty($tour_types)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Types')); ?></div>
                            <?php $__currentLoopData = $tour_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="tour_types[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($type)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="tour_type" value=""/>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($tour_include)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Tour Includes')); ?></div>
                            <?php $__currentLoopData = $tour_include; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="tour_includes[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($value)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="tour_include" value=""/>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($tour_exclude)): ?>
                        <div class="col-md-6 gmz-checkbox-wrapper">
                            <div class="search-form__label"><?php echo e(__('Tour Excludes')); ?></div>
                            <?php $__currentLoopData = $tour_exclude; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="checkbox-inline"><input type="checkbox" class="gmz-checkbox-item" name="tour_excludes[]" value="<?php echo e($key); ?>"><span><?php echo e(get_translate($value)); ?></span></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="tour_exclude" value=""/>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php app('eventy')->action('gmz_tour_search_form_after'); ?>
</form><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/tour/search-form.blade.php ENDPATH**/ ?>