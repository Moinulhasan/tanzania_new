<?php if(is_user_login()): ?>
<?php global $post; ?>
<div class="admin-bar d-flex align-items-center justify-content-between">
    <div>
        <a href="<?php echo e(dashboard_url('/')); ?>" class="item dashboard"><?php echo get_icon('icon_system_dashboard'); ?><span><?php echo e(__('Dashboard')); ?></span></a>

    <?php if(is_admin()): ?>
        <div class="new-action">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fal fa-wrench"></i> <span><?php echo e(__('Quick Action')); ?></span>
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo e(dashboard_url('settings')); ?>"><?php echo e(__('Setting')); ?></a>
                <a class="dropdown-item" href="<?php echo e(dashboard_url('menu')); ?>"><?php echo e(__('Menu')); ?></a>
                <a class="dropdown-item" href="<?php echo e(dashboard_url('all-users')); ?>"><?php echo e(__('Users')); ?></a>
                <a class="dropdown-item" href="<?php echo e(dashboard_url('language')); ?>"><?php echo e(__('Language')); ?></a>
                <a class="dropdown-item" href="<?php echo e(dashboard_url('all-media')); ?>"><?php echo e(__('Media')); ?></a>
                <a class="dropdown-item" href="<?php echo e(dashboard_url('import-font')); ?>"><?php echo e(__('Font Icon')); ?></a>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!is_customer()): ?>
    <div class="new-action">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-plus"></i> <span><?php echo e(__('New')); ?></span>
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php if(is_admin()): ?>
                <a class="dropdown-item" href="<?php echo e(dashboard_url('new-post')); ?>"><?php echo e(__('Post')); ?></a>
                <a class="dropdown-item" href="<?php echo e(dashboard_url('new-page')); ?>"><?php echo e(__('Page')); ?></a>
            <?php endif; ?>
                <?php if(is_enable_service('hotel')): ?>
                    <a class="dropdown-item" href="<?php echo e(dashboard_url('new-hotel')); ?>"><?php echo e(__('Hotel')); ?></a>
                <?php endif; ?>
                <?php if(is_enable_service('apartment')): ?>
                    <a class="dropdown-item" href="<?php echo e(dashboard_url('new-apartment')); ?>"><?php echo e(__('Apartment')); ?></a>
                <?php endif; ?>
                <?php if(is_enable_service('space')): ?>
                    <a class="dropdown-item" href="<?php echo e(dashboard_url('new-space')); ?>"><?php echo e(__('Space')); ?></a>
                <?php endif; ?>
                <?php if(is_enable_service('tour')): ?>
                    <a class="dropdown-item" href="<?php echo e(dashboard_url('new-tour')); ?>"><?php echo e(__('Tour')); ?></a>
                <?php endif; ?>
                <?php if(is_enable_service('beauty')): ?>
                    <a class="dropdown-item" href="<?php echo e(dashboard_url('new-beauty')); ?>"><?php echo e(__('Beauty')); ?></a>
                <?php endif; ?>
            <?php if(is_enable_service('car')): ?>
            <a class="dropdown-item" href="<?php echo e(dashboard_url('new-car')); ?>"><?php echo e(__('Car')); ?></a>
            <?php endif; ?>
            <a class="dropdown-item" href="<?php echo e(dashboard_url('all-media')); ?>"><?php echo e(__('Media')); ?></a>
            <?php if(is_admin()): ?>
                <a class="dropdown-item" href="<?php echo e(dashboard_url('import-font')); ?>"><?php echo e(__('Font Icon')); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

        <?php
            $check_edit = false;
            if(isset($post['post_type'])){
                if(is_admin()){
                    $check_edit = true;
                }elseif(is_partner() && get_current_user_id() == $post['author']){
                    $check_edit = true;
                }
            }
        ?>
    <?php if($check_edit): ?>
        <a href="<?php echo e(dashboard_url('edit-'. $post['post_type'] .'/' . $post['id'])); ?>" class="item"><i class="fal fa-pen"></i> <span><?php echo e(__('Edit')); ?></span></a>
    <?php endif; ?>
    </div>
    <a href="<?php echo e(url('logout')); ?>"><i class="fal fa-sign-out"></i> <?php echo e(__('Logout')); ?></a>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/components/admin-bar.blade.php ENDPATH**/ ?>