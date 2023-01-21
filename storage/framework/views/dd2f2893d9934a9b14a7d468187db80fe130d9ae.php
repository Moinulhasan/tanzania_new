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
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $image = get_attachment_url($item['thumbnail_id'], [100, 100]);
                $post_title = get_translate($item['post_title']);
            ?>
            <div class="post-item">
                <div class="thumbnail">
                    <a href="<?php echo e(get_post_permalink($item['post_slug'])); ?>">
                        <img src="<?php echo e($image); ?>" alt="<?php echo e($post_title); ?>" class="img-fluid"/>
                    </a>
                </div>
                <div class="info">
                    <h5 class="title">
                        <a href="<?php echo e(get_post_permalink($item['post_slug'])); ?>">
                            <?php echo e($post_title); ?>

                        </a>
                    </h5>
                    <p class="date"><?php echo e(date('M d, Y', strtotime($post['created_at']))); ?>

                    </p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<?php
    $cates = get_terms('name', 'post-category', 'full');
?>
<?php if(!$cates->isEmpty()): ?>
    <div class="widget-item">
        <h4 class="widget-title"><?php echo e(__('Categories')); ?></h4>
        <div class="widget-content">
            <ul>
                <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url('category/' . $val->term_name)); ?>"><?php echo e(get_translate($val->term_title)); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<?php
    $tags = get_terms('name', 'post-tag', 'full', 10);
?>
<?php if(!$tags->isEmpty()): ?>
    <div class="widget-item tags">
        <h4 class="widget-title"><?php echo e(__('Tags')); ?></h4>
        <div class="widget-content">
            <ul>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url('tag/' . $val->term_name)); ?>"><?php echo e(get_translate($val->term_title)); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/post/sidebar.blade.php ENDPATH**/ ?>