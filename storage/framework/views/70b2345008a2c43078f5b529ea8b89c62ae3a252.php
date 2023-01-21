<?php
    $faq = maybe_unserialize($post['faq']);
?>
<?php if(!empty($faq)): ?>
    <?php
        $ifaq = 0;
    ?>
    <?php if(!empty($faq)): ?>
        <section class="feature">
            <h2 class="section-title"><?php echo e(__('FAQs')); ?></h2>
            <div class="section-content">
                <div class="accordion" id="accordionFaq">
                    <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kfaq => $vfaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <div class="card-header" id="heading<?php echo e($kfaq); ?>">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left <?php if($ifaq != 0): ?> collapsed <?php endif; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($kfaq); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($kfaq); ?>">
                                        <?php echo e(get_translate($vfaq['question'])); ?>

                                        <div class="arrow">
                                                            <span class="arrow-up">
                                                                <i class="fal fa-chevron-up"></i>
                                                            </span>
                                            <span class="arrow-down">
                                                                <i class="fal fa-chevron-down"></i>
                                                            </span>
                                        </div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse<?php echo e($kfaq); ?>" class="collapse <?php if($ifaq == 0): ?> show <?php endif; ?>" aria-labelledby="heading<?php echo e($kfaq); ?>" data-parent="#accordionFaq">
                                <div class="card-body">
                                    <?php echo e(get_translate($vfaq['answer'])); ?>

                                </div>
                            </div>
                        </div>
                        <?php $ifaq++ ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/single/faq.blade.php ENDPATH**/ ?>