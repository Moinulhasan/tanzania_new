
<?php $__env->startSection('title', __('Discussion Forum')); ?>
<?php $__env->startSection('content'); ?>

<?php
the_breadcrumb([], 'page', [
    'title' => __('Discussion Forum')
]);

// the_breadcrumb($dest, 'travel-single');

?>

<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<section class="bg-white mx-3 mb-5">
    <div class="col-md-12 row pt-4">

    <?php echo $__env->make('Frontend::page.discussion.cat_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-md-9">
            <div class="my-4 text-center">
                <h3 class="section-title mt-3">
                    Tanzania Travel Forum
                </h3>

                <h5 class="dessc section-title">
                    Exchange travel advice, tips, accommodation reviews and other related information about traveling to Tanzania. <br>
                    Participate in discussions with both foreigners and Tanzanian locals.
                </h5>
            </div>

            <?php $__currentLoopData = $quests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card py-3 my-2 bg-light">
                    <div class="">
                        <div class="col-md-12 d-flex row pt-4">
                            <div class="col-md-11">
                                <h5 class="">
                                    <a class="color-pri" href="<?php echo e(route('discuss.answer',$ques->slug)); ?>">
                                        <?php echo e($ques->title); ?>

                                    </a>
                                </h5>
                                <p>
                                    <?php
                                        $cat = \App\Models\DiscussCategory::find($ques->category);
                                        $cat_name = $cat->title;

                                        $total = \App\Models\Answer::where('discussion_id',$ques->id)->count();

                                        $usr = \App\Models\User::find($ques->posted_by);
                                        $usr_name = $usr->first_name;
                                        $usr_name1 = $usr->last_name;
                                    ?>
                                    <i>
                                        Posted under <a class="color-pri" href="<?php echo e(route('discuss.answer',$cat->id)); ?>"><?php echo e($cat_name); ?></a> by <?php echo e($usr_name); ?> <?php echo e($usr_name1); ?> - <?php echo e(\Carbon\Carbon::parse($ques->created_at)->isoFormat('MMM Do YYYY')); ?>

                                    </i>
                                </p>
                                <p class="discus">
                                    <?php echo e($ques->question); ?>

                                </p>
                            </div>
                            <div class="col-md-1 text-center">
                                <div class="my-icn1">
                                    <i class="far fa-comment"></i>
                                </div>
                                <p class="color-p"><?php echo e($total); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    

    <div class="pagination-wrapper"><?php echo e($quests->withQueryString()->links()); ?></div>

    

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/page/discussion/questions.blade.php ENDPATH**/ ?>