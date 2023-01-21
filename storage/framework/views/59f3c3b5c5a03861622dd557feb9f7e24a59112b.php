<?php if(is_enable_service(GMZ_SERVICE_APARTMENT)): ?>
    <?php
        enqueue_scripts('match-height');
        $apartment_types = get_terms('name', 'apartment-type', 'full');
        $search_url = url('apartment-search');
    ?>
    <?php if(!$apartment_types->isEmpty()): ?>
        <section class="apartment-type">
            <div class="container py-40">
                <h2 class="section-title mb-20"><?php echo e(__('Apartment Types')); ?></h2>
                <div class="row">
                    <?php $__currentLoopData = $apartment_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $img = get_attachment_url($item->term_image, [250, 150]);
                            $term_title = get_translate($item->term_title);
                            $search_url = add_query_arg(['apartment_type' => $item->id], $search_url);
                        ?>
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="apartment-type__item" data-plugin="matchHeight">
                                <?php if(!empty($img)): ?>
                                    <div class="apartment-type__thumbnail">
                                        <a href="<?php echo e($search_url); ?>">
                                            <img class="_image-apartment" src="<?php echo e($img); ?>" alt="<?php echo e($term_title); ?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="apartment-type__info">
                                    <h3 class="apartment-type__name"><a href="<?php echo e($search_url); ?>"><?php echo e($term_title); ?></a></h3>
                                    <div class="apartment-type__description">
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/apartment/items/type.blade.php ENDPATH**/ ?>