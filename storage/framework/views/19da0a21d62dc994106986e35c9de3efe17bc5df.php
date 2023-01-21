<div class="breadcrumb">
    <div class="container">
        <?php
        // dd($post);
            
        ?>
        <ul>
            <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
            <?php if($post_type == 'car'): ?>
                <li><a href="<?php echo e(url('car-search')); ?>"><?php echo e(__('Car')); ?></a></li>
            <?php endif; ?>
            <?php if($post_type == 'page'): ?>
                <li><span><?php echo e($data['title']); ?></span></li>
            <?php elseif($post_type == 'blog'): ?>
                <li><span><a href="<?php echo e(route('blog')); ?>"><?php echo e(__('Blog')); ?></a></span></li>
                <li><span><?php echo e($post['post_title']); ?></span></li>

            <?php elseif($post_type == 'tour-single'): ?>
                <li><span><a href="<?php echo e(route('tour-search')); ?>"><?php echo e(__('Tours')); ?></a></span></li>
                <li><span><?php echo e($post['post_title']); ?></span></li>

            <?php elseif($post_type == 'hotel-single'): ?>
                <li><span><a href="<?php echo e(route('hotel-search')); ?>"><?php echo e(__('Hotels')); ?></a></span></li>
                <li><span><?php echo e($post['post_title']); ?></span></li>

            <?php elseif($post_type == 'destination-single'): ?>
                <li><span><a href="<?php echo e(route('destination')); ?>"><?php echo e(__('Destinations')); ?></a></span></li>
                <li><span><?php echo e($post->title); ?></span></li>

            <?php elseif($post_type == 'destination-abc'): ?>
            
                <li><span><a href="<?php echo e(route('destination')); ?>"><?php echo e(__('Destinations')); ?></a></span></li>
                <li><span><a href="<?php echo e(url('destination/'.$data['type'])); ?>"><?php echo e($data['type']); ?></a></span></li>
                <li><span><?php echo e($data['title']); ?></span></li>

            <?php elseif($post_type == 'event-single'): ?>
                <li><span><a href="<?php echo e(route('event')); ?>"><?php echo e(__('Events')); ?></a></span></li>
                <li><span><?php echo e($post->title); ?></span></li>
                
            <?php elseif($post_type == 'travel-single'): ?>
                <li><span><a href="<?php echo e(route('travelguide')); ?>"><?php echo e(__('Travel Guide')); ?></a></span></li>
                <li><span><?php echo e($post->title); ?></span></li>

            <?php elseif($post_type == 'disc-cat'): ?>
                <li><span><a href="<?php echo e(route('quest')); ?>"><?php echo e(__('Discussion Forum')); ?></a></span></li>
                <li><span><?php echo e($post->title); ?></span></li>
            <?php elseif($post_type == 'disc-post'): ?>

                <li><span><a href="<?php echo e(route('quest')); ?>"><?php echo e(__('Discussion Forum')); ?></a></span></li>
                <li><span><a href="<?php echo e(route('discuss',$data['slug'])); ?>"><?php echo e($data['category']); ?></a></span></li>
                <li><span><?php echo e($data['title']); ?></span></li>
            <?php elseif($post_type == 'att-single'): ?>
                <li><span><a href="<?php echo e(route('attraction')); ?>"><?php echo e(__('Popular Attractions')); ?></a></span></li>
                <li><span><?php echo e($post->title); ?></span></li>

            
        <?php elseif($post_type == 'disc-single'): ?>
            <li><span><a href="<?php echo e(route('quest')); ?>"><?php echo e(__('Discussion Forum')); ?></a></span></li>
            <li><span><?php echo e($post->title); ?></span></li>
                

            
            <?php elseif($post_type == 'term'): ?>
                <?php if($data['type'] == 'category'): ?>
                    <li><span><?php echo e(sprintf(__('Category: %s'), $data['title'])); ?></span></li>
                <?php elseif($data['type'] == 'tag'): ?>
                    <li><span><?php echo e(sprintf(__('Tag: %s'), $data['title'])); ?></span></li>
                <?php else: ?>
                    <li><span><?php echo e($data['title']); ?></span></li>
                <?php endif; ?>
            <?php else: ?>
                <li><span><?php echo e(get_translate($post['post_title'])); ?></span></li>
            <?php endif; ?>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/components/breadcrumb.blade.php ENDPATH**/ ?>