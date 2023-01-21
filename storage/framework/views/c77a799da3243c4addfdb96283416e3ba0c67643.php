<?php
    if(is_admin()){
        $menu_name = 'admin_menu';
    }elseif(is_partner()){
        $menu_name = 'partner_menu';
    }else{
        $menu_name = 'customer_menu';
    }
    $menus = admin_config($menu_name);
    $menus = Eventy::filter('gmz_dashboard_sidebar_menu', $menus);
    
    $prefix = admin_config('prefix');
    $currentScreen = Request::route()->getName();
    $current_params = \Illuminate\Support\Facades\Route::current()->parameters();
    foreach ($current_params as $key => $param) {
       if ($key == 'service'){
          $currentScreen = $param . '/' . $currentScreen ;
       }else if($key !== 'page' && $key !== 'id') {
          $currentScreen .= '/' . $param;
       }elseif($key == 'type'){
            $currentScreen = $currentScreen . '/' . $param;
       }
    }
?>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if (isset($item['service'])) {
                        if (!is_enable_service($item['service'])) {
                            continue;
                        }
                    }
                    if (isset($item['services'])) {
                        $all_services = count($item['services']);
                        $count_services = 0;
                        foreach ($item['services'] as $sitem) {
                            if (!is_enable_service($sitem)) {
                                $count_services += 1;
                            }
                        }
                        if ($all_services == $count_services) {
                            continue;
                        }
                    }
                ?>
                <?php if($item['type'] === 'heading'): ?>
                    <li class="menu menu-heading">
                        <div class="heading">
                            <?php echo get_icon('icon_system_minus'); ?>

                            <span><?php echo e(__($item['label'])); ?></span>
                        </div>
                    </li>
                <?php endif; ?>
                    <?php if($item['type'] === 'item'): ?>
                        <?php
                            $url = $item['screen'];
                            if($item['screen'] == 'dashboard'){
                                $url = '';
                            }
                        ?>
                        <li class="menu <?php if($currentScreen == $item['screen']): ?> active <?php endif; ?>">
                            <a href="<?php echo e(dashboard_url($url)); ?>" aria-expanded="false" class="dropdown-toggle">
                                <div class="d-flex align-items-center">
                                    <i class="fal <?php echo e($item['icon']); ?>"></i>
                                    <span><?php echo e(__($item['label'])); ?></span>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if($item['type'] === 'parent'): ?>
                        <li class="menu <?php if(in_array($currentScreen, $item['screen'])): ?> active <?php endif; ?>">
                            <a href="#<?php echo e($item['id']); ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <div class="d-flex align-items-center">
                                    <i class="fal <?php echo e($item['icon']); ?>"></i>
                                    <span><?php echo e(__($item['label'])); ?></span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            <?php if(isset($item['child']) && !empty($item['child'])): ?>
                            <ul class="collapse submenu list-unstyled <?php if(in_array($currentScreen, $item['screen'])): ?> show <?php endif; ?>" id="<?php echo e($item['id']); ?>" data-parent="#accordionExample">
                                <?php $__currentLoopData = $item['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if($currentScreen == $child['screen']): ?> active <?php endif; ?> <?php if($child['type'] == 'hidden'): ?> d-none <?php endif; ?>">
                                    <a href="<?php echo e(dashboard_url($child['screen'])); ?>"> <?php echo e(__($child['label'])); ?> </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

            <li class="menu menu-heading">
                <div class="heading">
                    <?php echo get_icon('icon_system_minus'); ?>

                    <span>Web Modules</span>
                </div>
            </li>

            <?php if(auth()->user()->id == 1): ?>
                <li class="menu">
                    <a href="<?php echo e(route('discuss.list')); ?>" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex align-items-center">
                            <i class="fal fa-comment"></i>
                            <span>Discussion Forum</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="<?php echo e(route('destination.list')); ?>" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex align-items-center">
                            <i class="fal fa-pennant"></i>
                            <span>Destinations</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="<?php echo e(route('travelguide.list')); ?>" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex align-items-center">
                            <i class="fal fa-university"></i>
                            <span>Travel Guide</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="<?php echo e(route('event.list')); ?>" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex align-items-center">
                            <i class="fal fa-calendar-alt"></i>
                            <span>Upcomming Events</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="<?php echo e(route('attraction.list')); ?>" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex align-items-center">
                            <i class="fal fa-heart"></i>
                            <span>Popular Attractions</span>
                        </div>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/components/sidebar.blade.php ENDPATH**/ ?>