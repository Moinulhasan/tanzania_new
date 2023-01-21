<?php
/**
 * Top bar 1
 */
?>
<?php if(get_option('top_bar_display') == "on"): ?>
   <?php
       $btn_text = get_option('top_bar_button_text');
       $btn_url = get_option('top_bar_button_url');
       $code = get_option('top_bar_promo_code');
   ?>
    <div id="top-bar-1" class="top-bar top-bar--1">
        <div class="top-bar__left">
            <div class="promo d-flex align-items-center">
                <?php echo e(get_translate(get_option('top_bar_promo_text'))); ?>

                &nbsp;
                <?php if($code): ?>
                    <a class="btn btn-primary btn-sm text-white btn-copy" data-toggle="tooltip"
                       title="<?php echo e(__('Copy')); ?>"><?php echo e(esc_html($code)); ?></a>
                <?php endif; ?>
                <?php if($btn_text && $btn_url): ?>
                    <a href="<?php echo e(esc_url($btn_url)); ?>"
                       class="mx-1 btn btn-sm btn-danger"><?php echo e(esc_html(get_translate($btn_text))); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="top-bar__right">
            <?php if(is_multi_language()): ?>
                <?php
                    $dropdown_langs = get_dropdown_language();
                ?>
                <?php if($dropdown_langs): ?>
                    <?php echo $dropdown_langs; ?>

                <?php endif; ?>
            <?php endif; ?>

            <?php if(is_multi_currency()): ?>
              <?php echo get_dropdown_currency(); ?>
            <?php endif; ?>
        </div>

    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/components/top-bar-1.blade.php ENDPATH**/ ?>