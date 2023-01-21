
<?php $__env->startSection('title', $disc->title); ?>
<?php $__env->startSection('content'); ?>

    <?php
        // the_breadcrumb([], 'page', [
        //     'title' => __('Discussion Forum')
        // ]);
        $param =[
            'slug'=>$category->slug,
            'category'=>$category->title,
            'title'=>$disc->title
];
       the_breadcrumb('', 'disc-post',$param);

    ?>
    <style>
        .tox-notifications-container {
            display: none !important;
        }
    </style>

    <section class="bg-white mx-3 mb-5">
        <div class="col-md-12 row pt-4">
            <?php echo $__env->make('Frontend::page.discussion.cat_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-md-9">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <h3 class="section-title">
                        <?php if(isset($category->title)): ?>
                            <?php echo e($category->title); ?>

                        <?php endif; ?>
                    </h3>

                    
                </div>

                <style>
                    .bg-custom {
                        background: #e5fccf;
                    }
                </style>


                <div class="card py-3 my-2 bg-custom">
                    <div class="col-md-12 d-flex">
                        <div class="col-md-2 text-center">
                            <div class="my-icn">
                                <i class="fal fa-user-circle"></i>
                            </div>
                            <div class="">
                                <?php
                                    // dd($disc->posted_by);
                                        $usr = \App\Models\User::find($disc->posted_by);
                                        $usr_name = $usr->first_name;
                                        $usr_name1 = $usr->last_name;
                                ?>

                                <p class="mb-0"><?php echo e($usr_name); ?> <?php echo e($usr_name1); ?></p>
                                <p class="mb-0">
                                    <i>
                                        <?php echo e(\Carbon\Carbon::parse($disc->created_at)->isoFormat('MMM Do YYYY')); ?>

                                    </i>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-10 pt-4">
                            <h5 class="color-pri">
                                <?php echo e($disc->title); ?>

                            </h5>
                            <p class="discus d-flex">
                                <?php echo e($disc->question); ?>

                            </p>
                        </div>
                    </div>
                </div>

                <?php $__currentLoopData = $ans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card py-3 my-2 bg-light">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-2 text-center">
                                <div class="my-icn">
                                    <i class="fal fa-user-circle"></i>
                                </div>
                                <div class="">
                                    <?php
                                        $usr = \App\Models\User::find($dis->user_id);
                                        $usr_name = $usr->first_name;
                                        $usr_name1 = $usr->last_name;
                                    ?>

                                    <p class="mb-0"><?php echo e($usr_name); ?> <?php echo e($usr_name1); ?></p>
                                    <p class="mb-0">
                                        <i>
                                            <?php echo e(\Carbon\Carbon::parse($dis->created_at)->isoFormat('MMM Do YYYY')); ?>

                                        </i>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-10 pt-4">
                                <h5 class="">
                                    <a class="color-pri" href="">
                                        
                                    </a>
                                </h5>
                                <p class="discus d-flex">
                                    <?php echo $dis->answer; ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="mt-4">
                    <h5 class="section-title color-pri">
                        Join the discussion
                    </h5>
                </div>

                <?php if(auth()->user()): ?>
                    <form action="<?php echo e(route('discuss.answer.store', $disc->id)); ?>">
                        <textarea class="form-control w-100" name="answer" id="mytextarea" cols="10" rows="10"
                                  placeholder="Reply here ..."></textarea>
                        <button type="submit" class="mt-2 btn btn-primary">Submit and Publish</button>
                    </form>
                <?php else: ?>

                    You need to <a href="<?php echo e(route('login')); ?>" class="color-pri">
                        <span style="font-weight: 500">Login</span>
                    </a> to reply to this post.

                <?php endif; ?>
            </div>
        </div>
        <div class="pagination-wrapper"><?php echo e($ans->withQueryString()->links()); ?></div>

    </section>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            menubar: false,
            statusbar: false,
            plugins: [
                "insertdatetime",
                'link'
            ],
            toolbar: "formatselect | fontselect | bold italic underline | forecolor | alignleft aligncenter alignright | bullist numlist | link",
            width: 1000,
            height: 200,
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/page/discussion/question/answer.blade.php ENDPATH**/ ?>