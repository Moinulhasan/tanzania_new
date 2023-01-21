<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 12/10/20
 * Time: 16:21
 */
$logo = get_logo();
$site_name = get_translate(get_option('site_name', 'iBooking'));
$is_logged = is_user_login();
?>
<?php echo $__env->make('Frontend::components.loader', ['page' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Frontend::components.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header class="site-header sticky-top bg-white">
    <div class="toggle-menu">
        <i class="fas fa-bars"></i>
    </div>
    <div class="site-branding">
        <h1>
            <a href="<?php echo e(url('/')); ?>">
                <?php if(!empty($logo)): ?>
                    <img src="<?php echo e($logo); ?>" alt="<?php echo e($site_name); ?>" height="39px"/>
                <?php else: ?>
                    <?php echo e(get_translate($site_name)); ?>

                <?php endif; ?>
            </a>
        </h1>
    </div>
    <div class="site-navigation">
        <div class="menu-overlay"></div>
        
        <?php
            if (has_nav_primary()) {
                get_nav([
                    'location' => 'primary',
                    'walker' => 'main'
                ]);
            }
        ?>
    </div>


    <div class="user-navigation">
        <ul>
            <?php if($is_logged): ?>
                <?php
                    $current_user_id = get_current_user_id();
                    $data_notification = GMZ_Notification::inst()->getLatestNotificationByUser($current_user_id, 'to');
                    $args = [
                        'user_id' => $current_user_id,
                        'user_hashing' => gmz_hashing($current_user_id)
                    ];
                ?>
                <li id="gmz-dropdown-notification" class="dropdown notifications"
                    data-action="<?php echo e(url('update-check-notification')); ?>"
                    data-params="<?php echo e(base64_encode(json_encode($args))); ?>">
                    <a class="dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       role="button"
                       aria-haspopup="false"
                       aria-expanded="false">
                        <i class="fal fa-bell"></i>
                        <?php if($data_notification['total']): ?>
                            <span class="badge"><?php echo e($data_notification['total']); ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item notify-title">
                            <?php echo e(__('Notifications')); ?>

                        </div>
                        <?php if($data_notification['total']): ?>
                            <div class="notify-scroll">
                                <?php $__currentLoopData = $data_notification['results']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="dropdown-item item">
                                        <div class="icon notify-<?php echo e($notification_item->type); ?>">
                                            <?php if($notification_item->type == 'booking'): ?>
                                                <i class="far fa-calendar-alt"></i>
                                            <?php elseif($notification_item->type == 'system'): ?>
                                                <i class="far fa-shield-check"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div class="notify-inner">
                                        <p class="details"><?php echo e(balance_tags($notification_item->title)); ?></p>
                                        <p class="details-desc"><?php echo e(balance_tags($notification_item->message)); ?></p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small><?php echo get_time_release($notification_item->created_at); ?></small>
                                        </p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <p class="text-muted"><?php echo e(__('No Notifications found!')); ?></p>
                    <?php endif; ?>
                        <a href="<?php echo e(dashboard_url('notifications')); ?>" class="dropdown-item text-center notify-item notify-all">
                            <?php echo e(__('View All')); ?>

                            <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>
                
            <?php endif; ?>


            <?php if(!$is_logged): ?>
                
                <li><a href="#gmz-login-popup" class="btn btn-sm btn-dark gmz-box-popup" data-effect="mfp-zoom-in"><i class="fal fa-sign-in pr-2"></i><?php echo e(__('Login/Signup')); ?></a></li>
            <?php else: ?>
                <li class="user-logged">
                    <?php
                        $avatar = get_user_avatar('', [100, 100]);
                    ?>
                        <div class="user-info">
                            <a href="javascript:void(0);">
                                <?php if(!empty($avatar)): ?>
                                    <img src="<?php echo e($avatar); ?>" alt="avatar" />
                                <?php endif; ?>
                                <span><?php echo e(get_user_name()); ?></span>
                                <i class="far fa-chevron-down"></i>
                            </a>
                        </div>
                        <div class="user-dropdown">
                            <ul>
                                <li>
                                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo get_icon('icon_system_dashboard'); ?><?php echo e(__('Dashboard')); ?></a>
                                </li>
                                <?php if(is_admin()): ?>
                                    <li>
                                        <a href="<?php echo e(dashboard_url('settings')); ?>"><?php echo get_icon('icon_system_settings'); ?><?php echo e(__('Settings')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo e(dashboard_url('profile')); ?>"><?php echo get_icon('icon_system_user'); ?><?php echo e(__('Your Profile')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(dashboard_url('wishlist')); ?>"><?php echo get_icon('icon_system_heart'); ?><?php echo e(__('Wishlist')); ?></a>
                                </li>
                                <li class="logout">
                                    <a href="<?php echo e(url('logout')); ?>"><?php echo get_icon('icon_system_logout'); ?><?php echo e(__('Logout')); ?></a>
                                </li>
                            </ul>
                        </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</header>


<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/components/header.blade.php ENDPATH**/ ?>