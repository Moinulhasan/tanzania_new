<?php
    $can_review = is_user_can_review('', $post['id'], GMZ_SERVICE_HOTEL);
    $comments = get_comment_list($post['id'], [
        'number' => get_comment_per_page(),
        'page' => request()->get('review_page', 1),
        'type' => GMZ_SERVICE_HOTEL,
    ]);
?>

<div class="gmz-comment-list mt-4" id="review-section">
    <h3 class="comment-count">
        <?php echo e(_n(__('%s review for this Hotel'), __('%s reviews for this Hotel'), $comments->total())); ?>

    </h3>
    <?php if(!$comments->isEmpty()): ?>
        <?php
            render_list_comment($comments->items());
            echo $comments->fragment('review-section')->links();
        ?>
    <?php endif; ?>
</div>

<?php if($can_review): ?>
    <div class="post-comment parent-form" id="gmz-comment-section">
        <div class="comment-form-wrapper">
            <form action="<?php echo e(url('add-comment')); ?>" class="comment-form form-sm gmz-form-action form-add-post-comment"
                  method="post" data-reload-time="1000">
                <h3 class="comment-title"><?php echo e(__('Leave a Review')); ?></h3>
                <p class="notice"><?php echo e(__('Your email address will not be published. Required fields are marked *')); ?></p>
                <?php echo $__env->make('Frontend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <input type="hidden" name="post_id" value="<?php echo e($post['id']); ?>"/>
                <input type="hidden" name="comment_id" value="0"/>
                <input type="hidden" name="comment_type" value="<?php echo e(GMZ_SERVICE_HOTEL); ?>"/>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <div class="review-select-rate">
                            <span><?php echo e(__('Your rating')); ?></span>
                            <div class="fas-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <input type="hidden" name="review_star" value="5" class="review_star">
                        </div>
                    </div>

                    <?php if(!is_user_login()){ ?>
                    <div class="form-group col-lg-6">
                        <input id="comment-name" type="text" name="comment_name" class="form-control gmz-validation" placeholder="<?php echo e(__('Your name*')); ?>" data-validation="required"/>
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group col-lg-6">
                        <input id="comment-email" type="email" name="comment_email" class="form-control gmz-validation"
                               placeholder="<?php echo e(__('Your email*')); ?>" data-validation="required"/>
                    </div>
                    <?php } ?>
                    <div class="w-100"></div>
                    <div class="form-group col-lg-6">
                        <input id="comment-title" type="text" name="comment_title" class="form-control gmz-validation"
                               placeholder="<?php echo e(__('Comment title*')); ?>" data-validation="required"/>
                    </div>

                    <div class="form-group col-lg-12">
                    <textarea id="comment-content" name="comment_content" placeholder="<?php echo e(__('Comment*')); ?>"
                              class="form-control gmz-validation" data-validation="required" rows="4"></textarea>
                    </div>
                </div>
                <div class="gmz-message"></div>
                <button type="submit" class="btn btn-primary text-uppercase"><?php echo e(__('Submit Review')); ?></button>
            </form>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/services/hotel/single/review.blade.php ENDPATH**/ ?>