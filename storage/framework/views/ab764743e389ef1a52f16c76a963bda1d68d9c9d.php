<?php
    $all_services = get_services_enabled();
    $srvc = [];
    if(in_array(GMZ_SERVICE_HOTEL, $all_services)){
        array_push($srvc, GMZ_SERVICE_HOTEL);
    }
    if(in_array(GMZ_SERVICE_APARTMENT, $all_services)){
        array_push($srvc, GMZ_SERVICE_APARTMENT);
    }
    if(in_array(GMZ_SERVICE_CAR, $all_services)){
        array_push($srvc, GMZ_SERVICE_CAR);
    }
    if(in_array(GMZ_SERVICE_SPACE, $all_services)){
        array_push($srvc, GMZ_SERVICE_SPACE);
    }
    if(in_array(GMZ_SERVICE_TOUR, $all_services)){
        array_push($srvc, GMZ_SERVICE_TOUR);
    }
    if(in_array(GMZ_SERVICE_BEAUTY, $all_services)){
        array_push($srvc, GMZ_SERVICE_BEAUTY);
    }
?>
<?php if(count($srvc) > 0): ?>
<div class="search-form-wrapper">
    <?php if(count($srvc) > 1): ?>
    <ul class="nav nav-tabs" id="searchFormTab" role="tablist">
        <?php if(in_array(GMZ_SERVICE_TOUR, $srvc)): ?>
            <li class="nav-item">
                <a class="nav-link active" id="tour-search-tab" data-toggle="tab" href="#tour-search" role="tab" aria-controls="tour-search" aria-selected="false"><i class="fal fa-map-marked"></i> <?php echo e(__('Tour Packages')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(in_array(GMZ_SERVICE_HOTEL, $srvc)): ?>
        <?php
            if(!in_array('tour', $srvc) && !in_array('apartment', $srvc) && !in_array('car', $srvc) && !in_array('space', $srvc)){
                $hotel_active = 'active';
            }else{
                $hotel_active = '';
            }
        ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($hotel_active); ?>" id="hotel-search-tab" data-toggle="tab" href="#hotel-search" role="tab" aria-controls="hotel-search" aria-selected="true"><i class="fal fa-hotel"></i> <?php echo e(__('Hotels & Rooms')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(in_array(GMZ_SERVICE_APARTMENT, $srvc)): ?>
            <?php
                if(!in_array('hotel', $srvc)){
                    $apartment_active = 'active';
                }else{
                    $apartment_active = '';
                }
            ?>
        <li class="nav-item">
            <a class="nav-link <?php echo e($apartment_active); ?>" id="apartment-search-tab" data-toggle="tab" href="#apartment-search" role="tab" aria-controls="apartment-search" aria-selected="true"><i class="fal fa-city"></i> <?php echo e(__('Apartment')); ?></a>
        </li>
        <?php endif; ?>
        <?php if(in_array(GMZ_SERVICE_CAR, $srvc)): ?>
                <?php
                    if(!in_array('hotel', $srvc) && !in_array('apartment', $srvc)){
                        $car_active = 'active';
                    }else{
                        $car_active = '';
                    }
                ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($car_active); ?>" id="car-search-tab" data-toggle="tab" href="#car-search" role="tab" aria-controls="car-search" aria-selected="false"><i class="fal fa-car-alt"></i> <?php echo e(__('Car')); ?></a>
            </li>
        <?php endif; ?>
            <?php if(in_array(GMZ_SERVICE_SPACE, $srvc)): ?>
                <?php
                    if(!in_array('hotel', $srvc) && !in_array('apartment', $srvc) && !in_array('car', $srvc)){
                        $space_active = 'active';
                    }else{
                        $space_active = '';
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($space_active); ?>" id="space-search-tab" data-toggle="tab" href="#space-search" role="tab" aria-controls="space-search" aria-selected="false"><i class="fal fa-building"></i> <?php echo e(__('Space')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(in_array(GMZ_SERVICE_BEAUTY, $srvc)): ?>
                <li class="nav-item">
                    <a class="nav-link" id="beauty-search-tab" data-toggle="tab" href="#beauty-search" role="tab" aria-controls="beauty-search" aria-selected="false"><i class="fal fa-spa"></i> <?php echo e(__('Beauty')); ?></a>
                </li>
            <?php endif; ?>
    </ul>
    <?php endif; ?>
    <div class="tab-content" id="searchFormTab">
        <?php if(in_array(GMZ_SERVICE_TOUR, $srvc)): ?>
            <div class="tab-pane fade show active tour-search-form" id="tour-search" role="tabpanel" aria-labelledby="tour-search-tab">
                <?php echo $__env->make('Frontend::services.tour.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if(in_array(GMZ_SERVICE_HOTEL, $srvc)): ?>
        <?php
            if(!in_array('tour', $srvc) && !in_array('apartment', $srvc) && !in_array('car', $srvc)  && !in_array('space', $srvc)){
                $hotel_active = 'show active';
            }else{
                $hotel_active = '';
            }
        ?>
            <div class="tab-pane fade show <?php echo e($hotel_active); ?> hotel-search-form" id="hotel-search" role="tabpanel" aria-labelledby="hotel-search-tab">
                <?php echo $__env->make('Frontend::services.hotel.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
        <?php if(in_array(GMZ_SERVICE_APARTMENT, $srvc)): ?>
            <?php
                if(!in_array('hotel', $srvc)){
                    $apartment_active = 'show active';
                }else{
                    $apartment_active = '';
                }
            ?>
        <div class="tab-pane fade <?php echo e($apartment_active); ?> apartment-search-form" id="apartment-search" role="tabpanel" aria-labelledby="apartment-search-tab">
            <?php echo $__env->make('Frontend::services.apartment.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endif; ?>
        <?php if(in_array(GMZ_SERVICE_CAR, $srvc)): ?>
                <?php
                    if(!in_array('hotel', $srvc) && !in_array('apartment', $srvc)){
                        $car_active = 'show active';
                    }else{
                        $car_active = '';
                    }
                ?>
        <div class="tab-pane fade <?php echo e($car_active); ?> car-search-form" id="car-search" role="tabpanel" aria-labelledby="car-search-tab">
            <?php echo $__env->make('Frontend::services.car.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endif; ?>

            <?php if(in_array(GMZ_SERVICE_SPACE, $srvc)): ?>
                <?php
                    if(!in_array('hotel', $srvc) && !in_array('apartment', $srvc) && !in_array('car', $srvc)){
                        $space_active = 'show active';
                    }else{
                        $space_active = '';
                    }
                ?>
                <div class="tab-pane fade <?php echo e($space_active); ?> space-search-form" id="space-search" role="tabpanel" aria-labelledby="space-search-tab">
                    <?php echo $__env->make('Frontend::services.space.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>

            <?php if(in_array(GMZ_SERVICE_BEAUTY, $srvc)): ?>
                <div class="tab-pane fade <?php if($srvc[0] == GMZ_SERVICE_BEAUTY): ?>show active <?php endif; ?> beauty-search-form" id="beauty-search" role="tabpanel" aria-labelledby="beauty-search-tab">
                    <?php echo $__env->make('Frontend::services.beauty.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/search-form.blade.php ENDPATH**/ ?>