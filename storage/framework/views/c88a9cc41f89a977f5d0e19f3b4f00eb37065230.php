<?php if(is_enable_service(GMZ_SERVICE_BEAUTY)): ?>
    <?php
        enqueue_scripts('match-height');
        $beauty_types = get_terms('name', 'beauty-services', 'full');
        $search_url = url('beauty-search');
    ?>
    <?php if(!$beauty_types->isEmpty()): ?>
        <section class="beauty-type">
            <div class="container py-40">
                <h2 class="section-title mb-20"><?php echo e(__('Beauty Services')); ?></h2>
                <div class="row">
                    <?php $__currentLoopData = $beauty_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $img = get_attachment_url($item->term_image, [250, 300]);
                            $term_title = get_translate($item->term_title);
                            $search_url = add_query_arg(['service' => $item->id], $search_url);
                        ?>
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="beauty-type__item" data-plugin="matchHeight">
                                <?php if(!empty($img)): ?>
                                    <div class="beauty-type__thumbnail">
                                        <a href="<?php echo e($search_url); ?>">
                                            <img class="_image-beauty" src="<?php echo e($img); ?>" alt="<?php echo e($term_title); ?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="beauty-type__info">
                                    <h3 class="beauty-type__name"><a href="<?php echo e($search_url); ?>"><?php echo e($term_title); ?></a></h3>
                                    <div class="beauty-type__description">
                                        <?php echo e(get_translate($item->term_description)); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/beauty/items/type.blade.php ENDPATH**/ ?>