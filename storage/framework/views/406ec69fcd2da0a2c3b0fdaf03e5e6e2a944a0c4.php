<div class="col-md-3 pr-5 pl-3">
    <div class="mb-3">
        <?php if(auth()->user()): ?>
            <a href="<?php echo e(route('quest.create')); ?>" class="btn btn-primary" style="border-radius:0;">
                <div class="px-2">
                    <i class="fas fa-pen-fancy pr-1"></i>
                    <span style="font-weight: 500">START A NEW TOPIC</span>
                </div>
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary" style="border-radius:0;">
                <div class="px-2">
                    <i class="fas fa-pen-fancy pr-1"></i>
                    <span style="font-weight: 500">Login / Signup</span>
                </div>
            </a>
        <?php endif; ?>
    </div>
    <h5 class="section-title" style="color: rgb(127, 127, 127)">
        Choose By Category
    </h5>
    <hr class="my-2">
    

    <?php
        $all = \App\Models\Discussion::all()->count();   
    ?>

    <div class="ml-2 d-flex">
        <div class="">
            <p class="mb-0">
                <i class="far fa-circle size-i mr-2"></i>
                <a class="cat-text color-pri" href="<?php echo e(route('quest')); ?>">All Types</a>
            </p>
        </div>
        <div class="ml-auto mr-2">
            <span class="badge badge-pill badge-info" style="line-height: auto !important; background:rgb(184, 184, 184)"><?php echo e($all); ?></span>
        </div>
    </div>
    <hr class="my-2">

    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $total = \App\Models\Discussion::where('category',$cat->id)->count();   
        ?>
        <div class="ml-2 d-flex">
            <div class="">
                <p class="mb-0">
                    <style>
                        .size-i{
                            font-size: 13px;
                            color: #f9c741;
                        }
                    </style>
                    <i class="far fa-circle size-i mr-2"></i>
                    <a class="cat-text color-pri" href="<?php echo e(route('discuss',$cat->slug)); ?>"><?php echo e($cat->title); ?></a>
                </p>
            </div>
            <div class="ml-auto mr-2">
                <span class="badge badge-pill badge-info" style="line-height: auto !important; background:rgb(184, 184, 184)"><?php echo e($total); ?></span>
            </div>
        </div>
        <hr class="my-2">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/page/discussion/cat_section.blade.php ENDPATH**/ ?>