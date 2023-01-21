<form action="<?php echo e(dashboard_url('update-menu')); ?>" method="POST" class="gmz-menu-form gmz-form-action" data-reload-time="1000">
    <?php echo $__env->make('Backend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <input type="hidden" name="menu_structure" value=""/>
	<?php
	if(empty( $menuObject ) && ! empty( $menuID )){
		echo '<p class="mt-3">'. __('No menu selected.') .'</p>';
	}else{
	?>
    <input type="hidden" value="<?php echo esc_attr($menuID); ?>" name="menu_id"/>
    <div class="gmz-menu-form-edit mb-4">
        <div class="form-inline">
            <div class="w-100 form-group d-flex align-items-center justify-content-between">
				<?php
				$menu_name = '';
				if ( ! empty( $menuObject ) ) {
					$menu_name = $menuObject->menu_title;
				}
				?>
                <div class="d-flex">
                <label class="mr-2"><?php echo e(__('Menu name:')); ?></label>
                <input type="text" class="form-control form-control-sm has-validation" value="<?php echo esc_attr($menu_name); ?>"
                       name="menu_name" data-validation="required" id="gmz-menu-title"/>
                </div>

                    <button class="btn btn-success btn-sm right"><?php echo e(__('Save menu')); ?></button>
            </div>
        </div>
        <hr/>
    </div>
    <div class="gmz-list-menu-box"
         data-menu-name="<?php echo e(__('Menu name')); ?>"
         data-menu-url="<?php echo e(__('Menu URL')); ?>"
         data-menu-type="<?php echo e(__('Type:')); ?>"
         data-menu-origin="<?php echo e(__('Origin:')); ?>"
         data-menu-target="<?php echo e(__('Open link in a new tab')); ?>"
         data-menu-section="<?php echo e(__('Enter Total Section')); ?>"
    >
        <ol class="sortable">
			<?php render_menu_tree( $menuStructureItems ); ?>
        </ol>
    </div>
	<?php
	}
	?>
    <div class="gmz-menu-position mt-4">
        <hr/>
        <div class="">
            <span class="mb-2 d-block"><b><?php echo e(__('Display location')); ?></b></span>
            <div class="radio radio-success mb-2">
                <input type="radio" name="menu_location" class="" value=""
                       id="menu-location-none" <?php echo empty( $currentLocation ) ? 'checked' : ''; ?>>
                <label for="menu-location-none"><?php echo e(__('None')); ?></label>
            </div>
			<?php
			if(! empty( $menuLocations )){

			foreach ($menuLocations as $k => $v) {
			$checked = '';
			if ( $k == $currentLocation ) {
				$checked = 'checked';
			}
			?>
            <div class="radio radio-success mb-2">
                <input type="radio" name="menu_location" class="" value="<?php echo e($k); ?>"
                       id="menu-location-<?php echo e($k); ?>" <?php echo e($checked); ?>>
                <label for="menu-location-<?php echo e($k); ?>"><?php echo e(__($v)); ?></label>
            </div>
			<?php
			}
			}
			?>
        </div>
    </div>
	<?php
	if(! empty( $menuObject )){
	$params = [
		'menuID'      => $menuID,
		'menuHashing' => gmz_hashing( $menuID )
	];
	?>
    <div class="lh-menu-action d-flex align-items-center justify-content-between mt-3">
        <a class="text-danger gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="<?php echo e(dashboard_url('delete-menu')); ?>" data-params="<?php echo e(base64_encode(json_encode($params))); ?>"><?php echo e(__('Delete this menu')); ?></a>
        <button class="btn btn-success btn-sm right"><?php echo e(__('Save menu')); ?></button>
    </div>
	<?php
	}
	?>
</form>
<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Backend/Views/screens/admin/menu/content.blade.php ENDPATH**/ ?>