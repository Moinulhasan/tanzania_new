<?php
    $gallery = $post['gallery'];
    $galleries = [];
    if(!empty($gallery)){
        $gallery = explode(',', $gallery);
        if(!empty($gallery)){
            foreach($gallery as $item){
                $url = get_attachment_url($item);
                if(!empty($url)){
                    array_push($galleries, $url);
                }
            }
        }
    }
    $video = $post['video'];
?>
<?php if(!empty($galleries)): ?>
    <?php
        enqueue_styles('slick');
        enqueue_scripts('slick');
        enqueue_styles('magnific-popup');
        enqueue_scripts('magnific-popup');
    ?>
    <section class="gallery">
        <?php if(!empty($video)): ?>
            <?php
                $video = get_video_url($video);
            ?>
            <a href="<?php echo e($video); ?>" class="video gmz-iframe-popup" data-effect="mfp-zoom-in">
                <i class="fal fa-photo-video"></i>
                <span><?php echo e(__('Video')); ?></span>
            </a>
        <?php endif; ?>

        <?php if(count($galleries) < 2): ?>
            <div class="gmz-single-image-with-lightbox">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($item); ?>">
                        <img src="<?php echo e($item); ?>" alt="home slider">
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="gmz-carousel-with-lightbox" data-count="<?php echo e(count($galleries)); ?>">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($item); ?>">
                        <img src="<?php echo e($item); ?>" alt="home slider">
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/hotel/single/gallery.blade.php ENDPATH**/ ?>