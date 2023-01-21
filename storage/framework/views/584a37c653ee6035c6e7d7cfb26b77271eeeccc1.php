<?php
    //widget nav
    $setting_widget_nav = [
       'footer_menu_1',
       'footer_menu_2',
       'footer_menu_3',
    ];
    foreach($setting_widget_nav as $value){
       $menu_id = get_option($value);
       $arr_widget_nav[] = [
           'label' => get_translate(get_option($value . '_heading')),
           'items' => get_menu_by_id($menu_id)
        ];
    }
    $copy_right = get_option('footer_copyright');
?>
<footer class="site-footer pt-60 pb-40">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $arr_widget_nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <?php if(isset($menu['items']['menu_id']) && has_nav($menu['items']['menu_id'])): ?>
                    <div class="col-md-3">
                        <div class="widget widget-nav">
                            <h4 class="widget__title"><?php echo e($menu['items']['menu_title']); ?></h4>
                                <?php
                                    get_nav_by_id($menu['items']['menu_id']);
                                ?>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <h4 class="widget__title">Follow us on</h4>
                    <?php
                        $social = get_option('social');
                    ?>
                    <?php if($social): ?>
                    <div class="social-footer d-flex mt-4">
                        <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mx-3 social_icn_size">
                                <a href="<?php echo e($s['url']); ?>" title="<?php echo e(get_translate($s['title'])); ?>">
                                    <?php if(strpos($s['icon'], ' fa-')): ?>
                                        <i class="<?php echo e($s['icon']); ?> term-icon"></i>
                                    <?php else: ?>
                                        <?php echo get_icon($s['icon']); ?>

                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <h4 class="widget__title mt-4">Membership/Partners</h4>
                    <div class="d-flex mt-4">
                        <div class="mr-2">
                            <img src="<?php echo e(asset('images/partners/tanzania-safaris.com.partners.jpeg')); ?>" alt="">
                        </div>
                        <div class="mr-2">
                            <img src="<?php echo e(asset('images/partners/tanzania-safaris.com.partners-1.jpg')); ?>" alt="">
                        </div>
                        <div class="mr-2">
                            <img src="<?php echo e(asset('images/partners/association_for_the_promotion_of_tourism_to_africa_small-e1605455307548.jpg')); ?>" alt="">
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
    <hr>
    <div class="footer-bottom pt-20 pb-10">
        <div class="container">
            <?php if(isset($footer_menu['menu_id']) &&  has_nav($footer_menu['menu_id'])): ?>
                <?php
                    get_nav_by_id($footer_menu['menu_id'],'menu-footer');
                ?>
            <?php endif; ?>
            <div class="copyright text-center">
                <?php if(!empty($copy_right)): ?>
                <?php echo e(get_translate($copy_right)); ?>

                <?php else: ?>
                    ©<?php echo e(date('Y')); ?> Book My Tour - All rights reserved.
                <?php endif; ?>
            </div>
                <?php app('eventy')->action('gmz_after_footer_bottom'); ?>
        </div>
    </div>
</footer>
<?php app('eventy')->action('gmz_after_footer'); ?>
<?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/components/footer.blade.php ENDPATH**/ ?>