
<?php $__env->startSection('title', get_translate($post['post_title'])); ?>
<?php $__env->startSection('class_body', 'single-hotel single-service'); ?>

<?php
    enqueue_styles([
       'mapbox-gl',
       'mapbox-gl-geocoder',
       'daterangepicker',
    ]);
    enqueue_scripts([
       'mapbox-gl',
       'mapbox-gl-geocoder',
       'moment',
       'daterangepicker'
    ]);
    $post_content = get_translate($post['post_content']);
    $enable_cancellation = $post['enable_cancellation'];
    $cancel_before = $post['cancel_before'];
    $cancellation_detail = $post['cancellation_detail'];
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('Frontend::services.hotel.single.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
        // the_breadcrumb($post, GMZ_SERVICE_HOTEL);
        the_breadcrumb($post, 'hotel-single');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pb-5">
                <?php echo $__env->make('Frontend::services.hotel.single.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('Frontend::services.hotel.single.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if(!empty($post_content)): ?>
                    <section class="description">
                        <h2 class="section-title"><?php echo e(__('Detail')); ?></h2>
                        <div class="section-content">
                            <?php echo balance_tags($post_content); ?>

                        </div>
                    </section>
                <?php endif; ?>

                <?php echo $__env->make('Frontend::services.hotel.single.availability', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <section class="map">
                    <h2 class="section-title"><?php echo e(__('Hotel On Map')); ?></h2>
                    <div class="section-content">
                        <input type="hidden" name="lat" id="lat" value="<?php echo e($post['location_lat']); ?>">
                        <input type="hidden" name="lon" id="lon" value="<?php echo e($post['location_lng']); ?>">



                        <style>
                            iframe{
                                height: 400px;
                                width: 100%;
                            }
                        </style>
                        <div id="mapCustom"></div>






                    </div>
                </section>

                <?php echo $__env->make('Frontend::services.hotel.single.policy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('Frontend::services.hotel.single.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('Frontend::services.hotel.single.review', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-4">
                <div class="siderbar-single">
                    <?php
                        $hotel_logo = $post['hotel_logo'];
                        $facilities = $post['hotel_facilities'];
                        $hotel_services = $post['hotel_services'];
                    ?>
                    <?php if(!empty($hotel_logo)): ?>
                        <div class="hotel-logo">
                            <?php
                                $hotel_logo_url = get_attachment_url($hotel_logo);
                            ?>
                            <img src="<?php echo e($hotel_logo_url); ?>" class="img-fluid" alt="hotel logo"/>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($facilities)): ?>
                        <section class="feature">
                            <h2 class="section-title"><?php echo e(__('Facilities')); ?></h2>
                            <div class="section-content">
                                <?php
                                    $facilities = explode(',', $facilities);
                                ?>
                                <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $term = get_term('id', $item);
                                    ?>
                                    <?php if($term): ?>
                                        <div class="term-item">
                                            <?php if(!empty($term->term_icon)): ?>
                                                <?php if(strpos($term->term_icon, ' fa-')): ?>
                                                    <i class="<?php echo e($term->term_icon); ?> term-icon"></i>
                                                <?php else: ?>
                                                    <?php echo get_icon($term->term_icon); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <div class="term-item__title"><?php echo e(get_translate($term->term_title)); ?></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php if(!empty($hotel_services)): ?>
                        <section class="feature">
                            <h2 class="section-title"><?php echo e(__('Hotel Services')); ?></h2>
                            <div class="section-content">
                                <?php
                                    $hotel_services = explode(',', $hotel_services);
                                ?>
                                <?php $__currentLoopData = $hotel_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $term = get_term('id', $item);
                                    ?>
                                    <?php if($term): ?>
                                        <div class="term-item">
                                            <?php if(!empty($term->term_icon)): ?>
                                                <?php if(strpos($term->term_icon, ' fa-')): ?>
                                                    <i class="<?php echo e($term->term_icon); ?> term-icon"></i>
                                                <?php else: ?>
                                                    <?php echo get_icon($term->term_icon); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <div class="term-item__title"><?php echo e(get_translate($term->term_title)); ?></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php echo $__env->make('Frontend::services.hotel.single.nearby-location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('Frontend::components.sections.partner-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('Frontend::services.hotel.single.nearby', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        // function myMap() {
        //    let lat =  document.getElementById("lat").value;
        //    let lon =  document.getElementById("lon").value;
        //     var mapProp= {
        //         center:new google.maps.LatLng(lat,lon),
        //         zoom:10,
        //     };
        //    // var marker = new google.maps.Marker({
        //    //      position : new google.maps.LatLng(lat, lon),
        //    //      map : map
        //    //  });
        //     var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        //     // var map = new google.maps.Map(document.getElementById("googleMap"),marker);
        //     var marker = new google.maps.Marker({
        //         position: new google.maps.LatLng(lat,lon),
        //         animation:google.maps.Animation.BOUNCE
        //     });
        //
        //     marker.setMap(map);
        // }
        var iframe = document.createElement("iframe");
        iframe.setAttribute('style',"border: none");
        iframe.onload = function() {
            var doc = iframe.contentDocument;

            iframe.contentWindow.showNewMap = function() {
                var mapContainer =  doc.createElement('div');
                mapContainer.setAttribute('style',"width: 100%; height: 380px");
                doc.body.appendChild(mapContainer);
                   let lat =  document.getElementById("lat").value;
                   let lon =  document.getElementById("lon").value;
                var mapOptions = {
                    center: new this.google.maps.LatLng(lat,lon),
                    zoom: 10.5,
                    mapTypeId: this.google.maps.MapTypeId.ROADMAP
                }

                var map = new this.google.maps.Map(mapContainer,mapOptions);
                   var marker = new this.google.maps.Marker({
                        position : new this.google.maps.LatLng(lat,lon),
                        map : map
                    });

                    var map = new this.google.maps.Map(document.getElementById("googleMap"),marker);
                    var marker = new this.google.maps.Marker({
                        position: new this.google.maps.LatLng(lat,lon),
                        animation:new this.google.maps.Animation.BOUNCE
                    });
                marker.setMap(map);
            }

            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyD2fZXv3Z-hbU_PfMGmlRX3MfcheHH7nsk&sensor=true&' + 'callback=showNewMap';
            iframe.contentDocument.getElementsByTagName('head')[0].appendChild(script);
        };
        console.log(iframe);
        document.getElementById('mapCustom').appendChild(iframe);
    </script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('Frontend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/single.blade.php ENDPATH**/ ?>