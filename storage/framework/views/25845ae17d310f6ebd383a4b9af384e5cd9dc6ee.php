<section class="hero-slider" style="min-height: 350px">
    <?php
        $slider = get_option('home_slider');
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
        $text_slider = get_translate(get_option('home_slider_text'));
    ?>
    <div class="container-fluid no-gutters p-0">
        <?php if(!empty($galleries)): ?>
            <div class="slider" data-plugin="slick">

                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e($item); ?>" alt="home slider">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="search-center">
            <div class="container bg-cstm">
                <?php if(!empty($text_slider)): ?>
                    <p class="search-center__title"><?php echo e($text_slider); ?></p>
                <?php endif; ?>
                <div class="container">
                    <?php echo $__env->make('Frontend::services.search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/page/home/slider.blade.php ENDPATH**/ ?>