<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 12/7/2020
 * Time: 10:24 PM
 */
?>
<?php if(is_enable_service('apartment')): ?>
    <div class="gmz-add-menu-box overflow-hidden">
        <h5 class="title d-flex align-items-center justify-content-between"><?php echo e(__('Apartment')); ?> <?php echo get_icon('icon_system_arrow_down'); ?></h5>
        <div class="menu-content-wrapper">
            <div class="content">
				<?php
				$posts = get_posts(['post_type' => 'apartment']);
				if(!$posts->isEmpty()){
				foreach ($posts as $k => $item){
				    $post_title = get_translate($item->post_title);
				?>
                <div class="checkbox  checkbox-success mb-2">
                    <input type="checkbox"
                           class="gmz-add-menu-item"
                           name="menu_item[]"
                           value="<?php echo e($item->id); ?>"
                           data-id="<?php echo e($item->id); ?>"
                           data-url="<?php echo e(get_apartment_permalink($item->post_slug)); ?>"
                           data-type="apartment"
                           data-name="<?php echo e($post_title); ?>"
                           id="menu_item_apartment_<?php echo e($item->id); ?>"/>
                    <label for="menu_item_apartment_<?php echo e($item->id); ?>"><?php echo e($post_title); ?></label>
                </div>
				<?php
				}
				}else {
					echo __('No apartment found');
				}
				?>
            </div>
            <?php if(!$posts->isEmpty()): ?>
                <a href="javascript:void(0);" class="btn btn-success btn-sm mt-2 right gmz-btn-add-menu-item"><?php echo e(__('Add to menu')); ?></a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/menu/items/apartment.blade.php ENDPATH**/ ?>