<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 12/7/2020
 * Time: 10:23 PM
 */
?>
<div class="gmz-add-menu-box overflow-hidden">
    <h5 class="title d-flex align-items-center justify-content-between"><?php echo e(__('Categories')); ?> <?php echo get_icon('icon_system_arrow_down'); ?></h5>
    <div class="menu-content-wrapper">
        <div class="content">
			<?php
			$posts = get_terms( 'name', 'post-category', 'full' );
			if(!$posts->isEmpty()){
			foreach ($posts as $k => $item){
			    $term_title = get_translate($item->term_title);
			?>
            <div class="checkbox  checkbox-success mb-2">
                <input type="checkbox"
                       class="gmz-add-menu-item"
                       name="menu_item[]"
                       value="<?php echo e($item->id); ?>"
                       data-id="<?php echo e($item->id); ?>"
                       data-url="<?php echo e(url('category/' . $item->term_name)); ?>"
                       data-type="category"
                       data-name="<?php echo e($term_title); ?>"
                       id="menu_item_cate_<?php echo e($item->id); ?>"/>
                <label for="menu_item_cate_<?php echo e($item->id); ?>"><?php echo e($term_title); ?></label>
            </div>
			<?php
			}
			}else {
				echo __('No categories found');
			}
			?>
        </div>
        <?php if(!$posts->isEmpty()): ?>
            <a href="javascript:void(0);" class="btn btn-success btn-sm mt-2 right gmz-btn-add-menu-item"><?php echo e(__('Add to menu')); ?></a>
        <?php endif; ?>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/menu/items/category.blade.php ENDPATH**/ ?>