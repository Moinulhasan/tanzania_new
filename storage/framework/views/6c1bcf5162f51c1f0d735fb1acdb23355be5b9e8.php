<!DOCTYPE html>
<html lang="<?php echo e(get_current_language()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php
        $favicon = get_favicon();
    ?>
    <?php if($favicon): ?>
        <link rel="shortcut icon" type="image/png" href="<?php echo e($favicon); ?>"/>
    <?php endif; ?>

    
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <?php admin_init_header(); ?>
    

</head>
<body class="gmz-body sidebar-noneoverflow <?php echo e(rtl_class()); ?> <?php echo e(body_class()); ?>">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php echo $__env->make('Backend::components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php echo $__env->make('Backend::components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">

            <div class="layout-px-spacing">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

            <!-- BEGIN FOOTER -->
            <?php echo $__env->make('Backend::components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- END FOOTER -->
        </div>
        <!--  END CONTENT AREA  -->


    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <?php admin_init_footer(); ?>
    

    <script>
        $(document).ready(function() {
            App.init();
        });
        feather.replace();
    </script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/layouts/master.blade.php ENDPATH**/ ?>