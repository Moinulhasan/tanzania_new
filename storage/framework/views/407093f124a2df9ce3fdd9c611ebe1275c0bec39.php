<?php
    $enable = get_option($post['post_type'] . '_show_partner_info', 'on');
?>

<?php if($enable == 'on'): ?>
    <?php
    $author = $post['author'];
    $avatar = get_user_avatar($author, [100, 100]);
    $userName = get_user_name($author);
    $userData = get_user_data($author);
    ?>
    <div class="partner-info">
        <div class="info-head">
            <a href="<?php echo e(url('author/' . $author)); ?>">
                <img src="<?php echo e($avatar); ?>" alt="avatar" />
                <p>
                    <span class="username"><?php echo e(sprintf(__('Posted by %s'), $userName)); ?></span>
                    <span class="address"><?php echo e($userData['address']); ?></span>
                </p>
            </a>
        </div>
        <div class="info-body">
            <?php echo e(nl2br($userData['description'])); ?>

        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/components/sections/partner-info.blade.php ENDPATH**/ ?>