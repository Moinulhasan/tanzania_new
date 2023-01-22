<div class="results-count d-flex align-items-center justify-content-between">
    <div>
        <?php echo $search_str; ?>

    </div>
    <div class="d-flex align-items-center justify-content-between">
        <?php if(isset($params['sort'])): ?>
        <div class="sort">
            <div class="dropdown">
                <button class="btn btn-link dropdown" type="button" id="dropdownMenuSort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo e(__('Sort')); ?> <i class="fal fa-angle-down arrow"></i>
                </button>
                <div class="dropdown-menu sort-menu dropdown-menu-right" aria-labelledby="dropdownMenuSort">
                    <div class="sort-title">
                        <h3><?php echo e(__('SORT BY')); ?></h3>
                    </div>
                    <div class="sort-item">
                        <label>
                            <input class="service-sort" type="radio" name="sort" data-value="new" value="new" <?php echo e((($params['sort'] == 'new') ? 'checked="checked"' : '')); ?>>
                            <?php echo e(__('New')); ?>

                        </label>
                    </div>
                    <div class="sort-item">
                        <span class="title"><?php echo e(__('Price')); ?></span>
                        <label>
                            <input class="service-sort" type="radio" name="sort" data-value="price_asc" value="price_asc" <?php echo e((($params['sort'] == 'price_asc') ? 'checked="checked"' : '')); ?>>
                            <?php echo e(__('Low to High')); ?>

                        </label>
                        <label>
                            <input class="service-sort" type="radio" name="sort" data-value="price_desc" value="price_desc" <?php echo e((($params['sort'] == 'price_desc') ? 'checked="checked"' : '')); ?>>
                            <?php echo e(__('High to Low')); ?>

                        </label>
                    </div>
                    <div class="sort-item">
                        <span class="title"><?php echo e(__('Name')); ?></span>
                        <label>
                            <input class="service-sort" type="radio" name="sort" data-value="name_a_z" value="name_a_z" <?php echo e((($params['sort'] == 'name_a_z') ? 'checked="checked"' : '')); ?>>
                            <?php echo e(__('A - Z')); ?>

                        </label>
                        <label>
                            <input class="service-sort" type="radio" name="sort" data-value="name_z_a" value="name_z_a" <?php echo e((($params['sort'] == 'name_z_a') ? 'checked="checked"' : '')); ?>>
                            <?php echo e(__('Z - A')); ?>

                        </label>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="layout">
            <a class="layout-item <?php echo e((($params['layout'] == 'list') ? 'active' : '')); ?>" data-layout="list" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('List View')); ?>">
                <i class="fal fa-list-alt"></i>
            </a>
            <a class="layout-item <?php echo e((($params['layout'] == 'grid') ? 'active' : '')); ?>" data-layout="grid" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Grid View')); ?>">
                <i class="fal fa-th"></i>
            </a>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/components/search-bar.blade.php ENDPATH**/ ?>