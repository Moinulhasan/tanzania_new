<?php
    if(empty($value)){
        $value = $std;
    }

    if(!isset($hide_real_address)){
       $hide_real_address = false;
    }

    if(!empty($value) && !is_array($value)){
       $value = json_decode($value, true);
    }

    $value = gmz_parse_args($value, [
        'address' => '',
        'city' => '',
        'state' => '',
        'postcode' => '',
        'country' => '',
        'lat' => 48.856613,
        'lng' => 2.352222,
        'zoom' => 13
    ]);
    $idName = str_replace(['[', ']'], '_', $id);

    admin_enqueue_styles('mapbox-gl');
    admin_enqueue_styles('mapbox-gl-geocoder');
    admin_enqueue_scripts('mapbox-gl');
    admin_enqueue_scripts('mapbox-gl-geocoder');
    $langs = get_languages_field();
?>

<div class="gmz-field form-group <?php echo e($layout); ?> gmz-field-<?php echo e($type); ?> <?php if($translation_ext == true): ?> gmz-field-has-translation <?php endif; ?>" id="gmz-field-<?php echo e($id); ?>-wrapper" <?php if(!empty($condition)): ?>data-condition="<?php echo e($condition); ?>" <?php endif; ?>>

    <?php if(!$hide_real_address): ?>
    <div class="row _gmz-row-real-address">
        <div class="col">
            <div class="form-group">
                <label for="<?php echo e($idName); ?>_address_"><?php echo e(__('Real Address')); ?></label>
                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="text" class="form-control gmz-real-address <?php if(!empty($validation)): ?> gmz-validation <?php endif; ?> <?php echo e(get_lang_class($key, $item)); ?>" name="<?php echo e($idName); ?>[address]<?php echo e(!empty($item) ? '['. $item .']' : ''); ?>" id="<?php echo e($idName); ?>_address<?php echo e(get_lang_suffix($item)); ?>" value="<?php echo e(get_translate($value['address'], $item)); ?>" <?php if(!empty($item)): ?> data-lang="<?php echo e($item); ?>" <?php endif; ?>/>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="w-100 mb-3"></div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col">
            <div class="mapbox-wrapper">
                <div class="form-group mapbox-text-search">
                    <div class="form-control" data-plugin="mapbox-geocoder" data-value="" data-placeholder="<?php echo e(__('Search on the map')); ?>"></div>
                    <input type="text" class="input-none gmz-address" name="" id="<?php echo e($idName); ?>_search_address" value="" />
                </div>

                <div id="<?php echo e($idName); ?>_mapbox" class="mapbox-content"
                     data-lat="<?php echo e((float)$value['lat']); ?>" data-lng="<?php echo e((float)$value['lng']); ?>"
                     data-zoom="<?php echo e($value['zoom']); ?>"></div>
                <input type="text" class="input-none gmz-zoom" name="<?php echo e($id); ?>[zoom]"
                       value="<?php echo e($value['zoom']); ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-sm-6 col-12">
            <div class="form-group field-no-translate">
                <label for="<?php echo e($idName); ?>_lat_"><?php echo e(__('Latitude')); ?></label>
                <input type="text" class="form-control gmz-lat" name="<?php echo e($id); ?>[lat]"
                       id="<?php echo e($idName); ?>_lat_" value="<?php echo e($value['lat']); ?>" >
            </div>
        </div>
        <div class="col col-sm-6 col-12">
            <div class="form-group field-no-translate">
                <label for="<?php echo e($idName); ?>_lng_"><?php echo e(__('Longtitude')); ?></label>
                <input type="text" class="form-control gmz-lng" name="<?php echo e($id); ?>[lng]"
                       id="<?php echo e($idName); ?>_lng_" value="<?php echo e($value['lng']); ?>" >
            </div>
        </div>

        <?php app('eventy')->action('gmz_after_location_field', $id, $idName, $value); ?>
        
    </div>
</div>
<?php if($break): ?>
    <div class="w-100"></div> <?php endif; ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/settings/fields/location.blade.php ENDPATH**/ ?>