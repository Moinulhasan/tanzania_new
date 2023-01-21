<?php
    $testimonial = get_option('testimonials');
?>
<?php if(!empty($testimonial)): ?>
<section class="testimonial py-50">
    <div class="container">
        <div class="carousel-s2">
            <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $name = get_translate($item['name']);
                    $content = get_translate($item['content']);
                ?>
                <div class="testimonial-item text-white text-center">
                    <i class="fas fa-quote-left fa-3x"></i>
                    <p class="testimonial-item__comment"><?php echo e(esc_html($content)); ?></p>
                    <p class="testimonial-item__author"><?php echo e(esc_html($name)); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/page/home/testimonial.blade.php ENDPATH**/ ?>