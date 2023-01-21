<?php
    enqueue_scripts('match-height');
    $list_blogs = get_posts([
        'post_type' => 'post',
        'posts_per_page' => 4
    ]);
?>
<?php if(!$list_blogs->isEmpty()): ?>
<section class="blog-list blog-list--grid py-40">
    <div class="container">
        <h2 class="section-title mb-20"><?php echo e(__('List Of Recent Blog')); ?></h2>
        <div class="row">
            <?php $__currentLoopData = $list_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $img = get_attachment_url($item['thumbnail_id'], [360, 240]);
                    $title = get_translate($item['post_title']);
                    $cates = $item['post_category'];
                    $cate_arr = [];
                    if(!empty($cates)){
                        $cates = explode(',', $cates);
                        foreach($cates as $cate){
                            $c = get_term('id', $cate);
                            if(!empty($c)){
                                 array_push($cate_arr, '<a href="'. url('category/' . $c->term_name) .'"><span>'. get_translate($c->term_title) .'</span></a>');
                            }
                        }
                    }
                    $post_description = get_translate($item['post_description']);
                    if(empty($post_description)){
                        $post_description = trim_text(get_translate($item['post_content']), 10);
                    }
                ?>
                <div class="col-md-3">
                    <div class="blog-item blog-item--grid" data-plugin="matchHeight">
                        <div class="blog-item__thumbnail">
                            <a href="<?php echo e(get_post_permalink($item['post_slug'])); ?>">
                                <img src="<?php echo e(esc_url($img)); ?>" alt="<?php echo e(esc_html($title)); ?>">
                            </a>
                        </div>
                        <div class="blog-item__details">
                            <a class="blog-item__label" href="<?php echo e(url('blog')); ?>"><?php echo e(__('News')); ?></a>
                            <h3 class="blog-item__title"><a href="<?php echo e(get_post_permalink($item['post_slug'])); ?>"><?php echo e(esc_html($title)); ?></a></h3>
                            <div class="blog-item__post-meta">
                                <span class="_date">
                                    <i class="far fa-clock"></i> <?php echo e(esc_html(date('M d, Y', strtotime($item['created_at'])))); ?></span>
                                
                            </div>
                            <p class="blog-item__excrept pt-3">
                                <a href="<?php echo e(get_post_permalink($item['post_slug'])); ?>">
                                    <?php echo e($post_description); ?>

                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/components/sections/blog.blade.php ENDPATH**/ ?>