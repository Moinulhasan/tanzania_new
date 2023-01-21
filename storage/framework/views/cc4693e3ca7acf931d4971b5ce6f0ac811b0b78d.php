<?php
    $posts = get_posts([
        'post_type' => 'post',
        'posts_per_page' => 5,
        'orderby' => 'id',
        'order' => 'DESC'
    ]);
?>
<?php if(!$posts->isEmpty()): ?>
    <div class="widget-item widget-recent-post">
        <h4 class="widget-title"><?php echo e(__('Recent posts')); ?></h4>
        <div class="widget-content">
            <div class="row">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $image = get_attachment_url($item['thumbnail_id'], [100, 100]);
                        $post_title = get_translate($item['post_title']);
                    ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="<?php echo e(get_post_permalink($item['post_slug'])); ?>">
                                <img src="<?php echo e($image); ?>" alt="<?php echo e($post_title); ?>" class="img-fluid w-100" />
                            </a>
                        </div>
                        <div class="info mt-2">
                            <h5 style="font-size: 14px">
                                <a href="<?php echo e(get_post_permalink($item['post_slug'])); ?>">
                                    <?php echo e($post_title); ?>

                                </a>
                            </h5>
                            <p style="font-size: 12px"><?php echo e(date('M d, Y', strtotime($post['created_at']))); ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/post/sidebar_two.blade.php ENDPATH**/ ?>