

<?php $__env->startSection('title', get_translate($post['post_title'])); ?>
<?php $__env->startSection('class_body', 'single-post'); ?>

<?php
    $post_content = get_translate($post['post_content']);
    $post_title = get_translate($post['post_title']);
?>

<?php $__env->startSection('content'); ?>
    <?php if(!empty($post['thumbnail_id'])): ?>
        <?php
            $thumbnail = get_attachment_url($post['thumbnail_id']);
        ?>
        <div class="feature-image">
            <img src="<?php echo e($thumbnail); ?>" alt="<?php echo e($post_title); ?>" />
        </div>
    <?php endif; ?>
    <?php
    // dd($post);
        the_breadcrumb($post, 'blog');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pb-5">
                <h1 class="post-title">
                    <?php echo e($post_title); ?>

                </h1>
                <ul class="meta">
                   <li>
                       <div class="value">
                           <?php echo e(get_user_name($post['author'])); ?>

                       </div>
                       <div class="label">
                           <?php echo e(__('Author')); ?>

                       </div>
                   </li>
                   <li>
                       <div class="value">
                           <?php echo e(date('M d, Y', strtotime($post['created_at']))); ?>

                       </div>
                       <div class="label">
                           <?php echo e(__('Date')); ?>

                       </div>
                   </li>
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
                                <div class="value">
                                    <?php echo implode(', ', $cates); ?>

                                </div>
                                <div class="label">
                                    <?php echo e(__('Category')); ?>

                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li>
                        <?php
                            $number_comment = get_comment_number($post['id'], 'post');
                        ?>
                        <div class="value">
                           <?php echo e($number_comment); ?>

                        </div>
                        <div class="label">
                            <?php echo e(__('Comments')); ?>

                        </div>
                    </li>
                </ul>
                <?php if(!empty($post_content)): ?>
                    <section class="description">
                        <div class="section-content">
                            <?php echo $post_content; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if(!empty($post['post_tag'])): ?>
                    <?php
                        $tag_str = explode(',', $post['post_tag']);
                        $tags = [];
                    ?>
                    <?php $__currentLoopData = $tag_str; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $term = get_term('id', $tag);
                            if(!is_null($term)){
                                array_push($tags, '<a class="tag-item" href="'. url('tag/' . $term->term_name) .'">'. esc_html(get_translate($term->term_title)) .'</a>');
                            }
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($tags)): ?>
                        <div class="post-tags">
                            <?php echo e(__('Tags ')); ?><?php echo implode(' ', $tags); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="siderbar-single">
                    <?php echo $__env->make('Frontend::services.post.sidebar_two', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php echo $__env->make('Frontend::services.post.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-3">
                <div class="siderbar-single">
                <?php echo $__env->make('Frontend::services.post.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Frontend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/post/single.blade.php ENDPATH**/ ?>