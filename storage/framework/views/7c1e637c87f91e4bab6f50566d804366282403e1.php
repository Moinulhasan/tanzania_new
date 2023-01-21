

<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('class_body', 'page-archive'); ?>

<?php
    $feature_image = get_option('blog_feature_image');
    $feature_image = get_attachment_url($feature_image);
?>


<?php $__env->startSection('content'); ?>
    <?php if(!empty($feature_image)): ?>
        <div class="feature-image">
            <img src="<?php echo e($feature_image); ?>" alt="blog page" />
        </div>
    <?php endif; ?>
    <?php
        if(!isset($type)){
            $type = '';
        }
        the_breadcrumb([], 'term', ['type' => $type, 'title' => $title]);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pb-5">
                <h2 class="archive-title">
                    <?php if(isset($type) && !empty($type)): ?>
                        <?php if($type == 'category'): ?>
                            <?php echo e(sprintf(__('Category: %s'), $title)); ?>

                        <?php endif; ?>
                        <?php if($type == 'tag'): ?>
                                <?php echo e(sprintf(__('Tag: %s'), $title)); ?>

                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo e($title); ?>

                    <?php endif; ?>
                </h2>
                <?php if(!$posts->isEmpty()): ?>
                    <div class="row">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $post_title = get_translate($post['post_title']);
                            ?>
                        <div class="col-lg-12">
                            <div class="post-item">
                                <div class="thumbnail">
                                    <a href="<?php echo e(get_post_permalink($post['post_slug'])); ?>">
                                    <?php if(!empty($post['thumbnail_id'])): ?>
                                        <?php
                                            $thumbnail = get_attachment_url($post['thumbnail_id'], [840, 400])
                                        ?>
                                        <?php if(!empty($thumbnail)): ?>
                                            <img src="<?php echo e($thumbnail); ?>" class="img-fluid" alt="<?php echo e($post_title); ?>" />
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="date"><?php echo e(date(get_date_format(), strtotime($post['created_at']))); ?></div>
                                    </a>
                                </div>
                                <div class="info">
                                    <h3 class="post-title">
                                        <a href="<?php echo e(get_post_permalink($post['post_slug'])); ?>"><?php echo e($post_title); ?></a>
                                    </h3>
                                    <ul class="meta">
                                        <li><?php echo e(sprintf(__('By %s'), get_user_name($post['author']))); ?></li>
                                        <?php if(!empty($post['post_category'])): ?>
                                            <?php
                                                $cate_str = explode(',', $post['post_category']);
                                                $cates = [];
                                            ?>
                                            <?php $__currentLoopData = $cate_str; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $term = get_term('id', $cate);
                                                    if(!is_null($term)){
                                                        array_push($cates, '<a href="'. url('category/' . $term->term_name) .'">'. get_translate($term->term_title) .'</a>');
                                                    }
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($cates)): ?>
                                                <li>
                                                    <?php echo e(__('On ')); ?><?php echo implode(', ', $cates); ?>

                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php echo $posts->onEachSide(1)->links(); ?>

                <?php else: ?>
                    <div class="alert alert-warning mt-4"><?php echo e(__('No posts found!')); ?></div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3">
                <div class="siderbar-single">
                    <?php echo $__env->make('Frontend::services.post.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Frontend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/post/archive.blade.php ENDPATH**/ ?>