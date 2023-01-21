<!DOCTYPE html>
<html lang="<?php echo e(get_current_language()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php
        $favicon = get_favicon();
        if($favicon)
            echo '<link rel="shortcut icon" type="image/png" href="'. $favicon .'"/>';
    ?>


    <?php
        $page_title = seo_page_title();
        if($page_title){
            $title_tag =  $page_title;
        }else{
            $site_name = get_translate(get_option('site_name', 'iBooking'));
            $seo_separator_title = get_seo_title_separator();
            $title_tag = $site_name . ' ' . $seo_separator_title;
        }
    ?>

    
     <title><?php echo $__env->yieldContent('title'); ?></title>

    <?php echo seo_meta(); ?>

    <?php init_header(); ?>
    <?php echo $__env->yieldContent('style'); ?>
</head>
<body class="body <?php echo $__env->yieldContent('class_body'); ?> <?php echo e(rtl_class()); ?>">
<?php echo $__env->make('Frontend::components.admin-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Frontend::components.top-bar-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Frontend::components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="site-content">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('Frontend::components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
@media (min-width: 992px){
ul.main-menu > li:not(.mega-menu) ul.sub-menu li a {
    font-size: 1rem;
    line-height: 13px !important;
padding: 8px 0px 10px 8px !important}}
@media (min-width: 992px){
ul.main-menu > li:not(.mega-menu) ul.sub-menu {
padding: 8px 0 !important;}}
@media (min-width: 992px){
ul.main-menu > li:not(.mega-menu) ul.sub-menu {min-width:640px !important}}
</style>
<?php init_footer(); ?>


<script>
    $('document').ready(function() {
		
		
        $('#exp_col').on('click', function(e) {
            e.preventDefault();
            var text = $(this).text();
            var new_text = "Collapse All";
            var pre_text = "Expand All";
            if(text == "Expand All") {
                $(this).text(new_text);
                $('#accordionFaq [data-parent]').addClass('show');
                $('#accordionFaq button').removeClass('collapsed');
                
            }
            else {
                $(this).text(pre_text);
                $('#accordionFaq [data-parent]').removeClass('show');
                $('#accordionFaq button').addClass('collapsed');
            }
        });

        // $('.lf_click').on('click', function(e) {
        //     e.preventDefault();
        //     var id = e.target.id;
        //     if(id == 'overview') {
        //         $('.destClass').removeClass('d-none');
        //         window.history.pushState('page2', 'Title', '/destination/<?php echo e(request()->id); ?>/'+encodeURIComponent(id));

        //     }
        //     else {
        //         $('.destClass').addClass('d-none');
        //         $('.'+id).removeClass('d-none');
        //         window.history.pushState('page2', 'Title', '/destination/<?php echo e(request()->id); ?>/'+encodeURIComponent(id));
        //     }
            
        // })
    });
</script>


    

</body>
</html>
<?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/layouts/master.blade.php ENDPATH**/ ?>