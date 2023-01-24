<section class="hero-slider">
    <?php
        $slider = get_option('hotel_slider');
        $galleries = [];
        if(!empty($slider)){
            $slider = explode(',', $slider);
            if(!empty($slider)){
                foreach($slider as $item){
                    $url = get_attachment_url($item, [1920, 768]);
                    if(!empty($url)){
                        array_push($galleries, $url);
                    }
                }
            }
        }
        $text_slider = get_translate(get_option('hotel_slider_text'));
    ?>
    <div class="container-fluid no-gutters p-0">
        <?php if(!empty($galleries)): ?>
            <div class="slider" data-plugin="slick">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e($item); ?>" alt="hotel slider">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <div class="search-center">
                <div class="container">
                    <div class="search-form-wrapper">
                        <div class="hotel-search-form">
                            <?php if(!empty($text_slider)): ?>
                                <p class="_title"><?php echo e($text_slider); ?></p>
                            <?php endif; ?>
                            <?php
                                enqueue_styles([
                                   'mapbox-gl',
                                   'mapbox-gl-geocoder'
                                ]);
                                enqueue_scripts([
                                   'mapbox-gl',
                                   'mapbox-gl-geocoder'
                                ]);
                            ?>
                            <?php echo $__env->make('Frontend::services.hotel.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/hotel/items/slider.blade.php ENDPATH**/ ?>