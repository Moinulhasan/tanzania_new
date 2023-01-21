<?php
    enqueue_styles('fotorama');
    enqueue_scripts('fotorama');
    $booking_form = $post['booking_form'];
    $external_booking = $post['external_booking'];
?>
<section class="feature">
    <h2 class="section-title d-flex align-items-center justify-content-between">
        <?php echo e(__('Room Availability')); ?>

        <div>
            <?php if($booking_form == 'enquiry' || $booking_form == 'both'): ?>
                <?php if($external_booking == 'on'): ?>
                    <a href="<?php echo e(esc_url($post['external_link'])); ?>" class="btn btn-primary btn-book-now mt-0"><?php echo e(__('Book Now')); ?></a>
                <?php endif; ?>
            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#hotelEnquiryModal">
                <?php echo e(__('Send Enquiry')); ?>

            </a>
            <?php endif; ?>
        </div>
    </h2>
    <?php if($booking_form == 'instant' || $booking_form == 'both'): ?>
        <?php if($external_booking != 'on'): ?>
            <div class="section-content">
        <div id="room-render-wrapper" class="room-render-wrapper">
            <?php echo $__env->make('Frontend::services.hotel.single.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Frontend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form id="gmz-room-booking" action="<?php echo e(url('hotel-add-cart')); ?>" method="POST" data-action-real-price="<?php echo e(url('room-get-real-price')); ?>">
                <input type="hidden" name="hotel_hashing" value="<?php echo e(gmz_hashing($post['id'])); ?>" />
            <div class="room-html"></div>
            <div id="room-booking-form" class="room-booking-form">
                <?php echo $__env->make('Frontend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h4 class="room-booking-form-title"><?php echo e(__('Booking Form')); ?></h4>
                <div class="d-flex justify-content-between">
                <?php
                   $extra_services = maybe_unserialize($post['extra_services']);
                ?>
                <?php if(!empty($extra_services)): ?>
                    <div class="hotel-extra-services">
                        <h5><?php echo e(__('Extra Services')); ?></h5>
                        <div class="row gmz-checkbox-wrapper">
                            <?php $__currentLoopData = $extra_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ek => $ev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="gmz-checkbox-item" name="extra_service[]" value="<?php echo e($ek); ?>" />
                                        <span><?php echo e(get_translate($ev['title'])); ?></span>
                                        (<?php echo e(convert_price($ev['price'])); ?>)
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                    <div class="booking-form-detail <?php if(empty($extra_services)): ?> alone <?php endif; ?>">
                        <h5><?php echo e(__('Details')); ?></h5>
                        <div class="total-room">
                            <div class="label">
                                <?php echo e(__('Total Room')); ?>

                            </div>
                            <div class="value" id="gmz-render-number-room">
                                2
                            </div>
                        </div>
                        <div class="total-price">
                            <div class="label">
                                <?php echo e(__('Total Price')); ?>

                            </div>
                            <div class="value" id="gmz-render-price-room">
                                <?php echo e(convert_price(300)); ?>

                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('BOOK NOW')); ?></button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
        <?php endif; ?>
    <?php endif; ?>
</section>


<?php echo $__env->make('Frontend::services.hotel.single.modal-enquiry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Frontend::services.hotel.single.modal-room', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/single/availability.blade.php ENDPATH**/ ?>