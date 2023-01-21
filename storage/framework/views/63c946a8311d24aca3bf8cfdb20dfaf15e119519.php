    <?php
        $verify_codes = get_seo_verify_config();
    ?>
    <?php if(!empty($verify_codes['google'])): ?>
            <meta name="google-site-verification" content="<?php echo e($verify_codes['google']); ?>" />
    <?php endif; ?>
    <?php if(!empty($verify_codes['bing'])): ?>
        <meta name="msvalidate.01" content="<?php echo e($verify_codes['bing']); ?>" />
    <?php endif; ?>
    <?php if(!empty($verify_codes['yandex'])): ?>
        <meta name="yandex-verification" content="<?php echo e($verify_codes['yandex']); ?>" />
    <?php endif; ?>
    <?php if(!empty($verify_codes['baidu'])): ?>
        <meta name="baidu-site-verification" content="<?php echo e($verify_codes['baidu']); ?>" />
    <?php endif; ?>

<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/seo/verify.blade.php ENDPATH**/ ?>