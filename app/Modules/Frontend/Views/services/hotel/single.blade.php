@extends('Frontend::layouts.master')
@section('title', get_translate($post['post_title']))
@section('class_body', 'single-hotel single-service')

@php
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
@endphp

@section('content')
    @include('Frontend::services.hotel.single.gallery')
    @php
        // the_breadcrumb($post, GMZ_SERVICE_HOTEL);
        the_breadcrumb($post, 'hotel-single');
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pb-5">
                @include('Frontend::services.hotel.single.header')

                @include('Frontend::services.hotel.single.meta')

                @if(!empty($post_content))
                    <section class="description">
                        <h2 class="section-title">{{__('Detail')}}</h2>
                        <div class="section-content">
                            {!! balance_tags($post_content) !!}
                        </div>
                    </section>
                @endif

                @include('Frontend::services.hotel.single.availability')

                <section class="map">
                    <h2 class="section-title">{{__('Hotel On Map')}}</h2>
                    <div class="section-content">
                        <input type="hidden" name="lat" id="lat" value="{{$post['location_lat']}}">
                        <input type="hidden" name="lon" id="lon" value="{{$post['location_lng']}}">
{{--                        <div class="map-single" data-lat="{{$post['location_lat']}}" data-lng="{{$post['location_lng']}}"></div>--}}
{{--                        <div id="googleMap" style="width:100%;height:400px;"></div>--}}
{{--                        <img src="http://maps.googleapis.com/maps/api/staticmap?center=-15.800513,-47.91378&zoom=11&size=200x200&sensor=false">--}}
                        <style>
                            iframe{
                                height: 400px;
                                width: 100%;
                            }
                        </style>
                        <div id="mapCustom"></div>
{{--                        <iframe--}}
{{--                                src='https://maps.google.com/maps?q=".{{$post['location_lat']}}.",".{{$post['location_lng']}}."&hl=es;z=14&output=embed&language=en'--}}
{{--                                frameborder='4'--}}
{{--                                style='border:0'--}}
{{--                        >--}}
{{--                        </iframe>--}}
                    </div>
                </section>

                @include('Frontend::services.hotel.single.policy')

                @include('Frontend::services.hotel.single.faq')

                @include('Frontend::services.hotel.single.review')
            </div>
            <div class="col-lg-4">
                <div class="siderbar-single">
                    @php
                        $hotel_logo = $post['hotel_logo'];
                        $facilities = $post['hotel_facilities'];
                        $hotel_services = $post['hotel_services'];
                    @endphp
                    @if(!empty($hotel_logo))
                        <div class="hotel-logo">
                            @php
                                $hotel_logo_url = get_attachment_url($hotel_logo);
                            @endphp
                            <img src="{{$hotel_logo_url}}" class="img-fluid" alt="hotel logo"/>
                        </div>
                    @endif
                    @if(!empty($facilities))
                        <section class="feature">
                            <h2 class="section-title">{{__('Facilities')}}</h2>
                            <div class="section-content">
                                @php
                                    $facilities = explode(',', $facilities);
                                @endphp
                                @foreach($facilities as $item)
                                    @php
                                        $term = get_term('id', $item);
                                    @endphp
                                    @if($term)
                                        <div class="term-item">
                                            @if(!empty($term->term_icon))
                                                @if(strpos($term->term_icon, ' fa-'))
                                                    <i class="{{$term->term_icon}} term-icon"></i>
                                                @else
                                                    {!! get_icon($term->term_icon) !!}
                                                @endif
                                            @endif
                                            <div class="term-item__title">{{get_translate($term->term_title)}}</div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @if(!empty($hotel_services))
                        <section class="feature">
                            <h2 class="section-title">{{__('Hotel Services')}}</h2>
                            <div class="section-content">
                                @php
                                    $hotel_services = explode(',', $hotel_services);
                                @endphp
                                @foreach($hotel_services as $item)
                                    @php
                                        $term = get_term('id', $item);
                                    @endphp
                                    @if($term)
                                        <div class="term-item">
                                            @if(!empty($term->term_icon))
                                                @if(strpos($term->term_icon, ' fa-'))
                                                    <i class="{{$term->term_icon}} term-icon"></i>
                                                @else
                                                    {!! get_icon($term->term_icon) !!}
                                                @endif
                                            @endif
                                            <div class="term-item__title">{{get_translate($term->term_title)}}</div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @include('Frontend::services.hotel.single.nearby-location')

                    @include('Frontend::components.sections.partner-info')

                </div>
            </div>
        </div>
    </div>
    @include('Frontend::services.hotel.single.nearby')
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

{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2fZXv3Z-hbU_PfMGmlRX3MfcheHH7nsk&callback=myMap&v=weekly&language=en"></script>--}}
@stop

