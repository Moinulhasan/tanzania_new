@php
    $img = get_attachment_url($item->thumbnail_id, [360, 240]);
    $title = get_translate($item->post_title);
    $content = get_translate($item->post_content);
    $location = get_translate($item->location_address);
@endphp
{{--<style>--}}
{{--    .tour-item:hover {--}}
{{--        height: 348.656px !important;--}}
{{--        opacity: 1;--}}
{{--        transition: opacity 1s linear;--}}
{{--        cursor: pointer;--}}
{{--    }--}}

{{--    .tour-item:hover .tour-item__details #chhe {--}}
{{--        display: block !important;--}}
{{--        transition-duration: 0.55s !important;--}}
{{--        transition-delay: 0.55s !important;--}}
{{--        opacity: 1 !important;--}}
{{--    }--}}

{{--    .tour-item:hover .tour-item__thumbnail img {--}}
{{--        height: 120px !important;--}}
{{--        transition-duration: 0.35s;--}}
{{--        transition-delay: 0.35s;--}}
{{--    }--}}
{{--</style>--}}
{{--<div class="tour-item tour-item--grid" data-plugin="matchHeight">--}}
{{--    <div class="tour-item__thumbnail">--}}
{{--        @php echo add_wishlist_box($item->id, GMZ_SERVICE_TOUR); @endphp--}}
{{--        <a href="{{get_tour_permalink($item->post_slug)}}">--}}
{{--            --}}{{--            {{dd($img)}}--}}
{{--            <img src="{{asset($img)}}" alt="{{$title}}">--}}
{{--        </a>--}}
{{--        @if(!empty($location))--}}
{{--            <p class="tour-item__location"><i class="fas fa-map-marker-alt mr-2"></i>{{$location}}</p>--}}
{{--        @endif--}}
{{--        @action('gmz_tour_single_after_thumbnail', $item)--}}
{{--    </div>--}}
{{--    <div class="tour-item__details">--}}
{{--        @if($item->is_featured == 'on')--}}
{{--            <span class="tour-item__label">{{__('Featured')}}</span>--}}
{{--        @endif--}}
{{--        <h3 class="tour-item__title"><a href="{{get_tour_permalink($item->post_slug)}}">{{$title}}</a></h3>--}}
{{--        <div class="d-flex justify-content-between">--}}
{{--            <span class="value">{{get_translate($item->duration)}} days durations</span>--}}
{{--            <div class="tour-item__price">--}}
{{--                <span class="_retail">{{convert_price($item['adult_price'])}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div style="display: none;opacity: 0" id="chhe">--}}
{{--            <div class="tour-item__meta">--}}
{{--                <div class="meta-item duration">--}}
{{--                    <i class="fal fa-calendar-alt"></i>--}}
{{--                    <div class="duration-info">--}}
{{--                        <span class="label">{{__('Duration')}}</span>--}}
{{--                        <span class="value">{{get_translate($item->duration)}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="meta-item group-size">--}}
{{--                    <i class="fal fa-users"></i>--}}
{{--                    <div class="group-size-info">--}}
{{--                        <span class="label">{{__('Group Size')}}</span>--}}
{{--                        <span class="value">{{sprintf(__('%s people'), $item->group_size)}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="d-flex  align-items-center justify-content-center">--}}
{{--                --}}{{--            <div class="tour-item__price">--}}
{{--                --}}{{--                <span class="_retail">{{convert_price($item['adult_price'])}}</span>--}}
{{--                --}}{{--            </div>--}}
{{--                <a class="btn btn-primary tour-item__view-detail"--}}
{{--                   href="{{get_tour_permalink($item->post_slug)}}">{{__('View Detail ')}}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<style>
    .card {
        /*    position: relative;*/
        /*    top: 50%;*/
        /*    left: 50%;*/
        /*    -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0);*/
        /*    transform: translateX(-50%) translateY(-50%) translateZ(0);*/
        width: 100%;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        -webkit-transition: box-shadow 0.5s;
        transition: box-shadow 0.5s;
    }

    .card a {
        color: inherit;
        text-decoration: none;
    }

    .card:hover {
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.3);
    }


    /**
    * DATE
    **/

    .card__date {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
        padding-top: 10px;
        /*background-color: coral;*/
        /*border-radius: 50%;*/
        color: #fff;
        text-align: center;
        font-weight: 700;
        line-height: 13px;
    }

    .card__date__day {
        font-size: 14px;
    }

    .card__date__month {
        text-transform: uppercase;
        font-size: 10px;
    }


    /**
    * THUMB
    **/

    .card__thumb {
        height: 245px;
        overflow: hidden;
        background-color: #000;
        -webkit-transition: height 0.5s;
        transition: height 0.5s;
    }

    .card__thumb img {
        width: 100%;
        display: block;
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: opacity 0.5s, -webkit-transform 0.5s;
        transition: opacity 0.5s, -webkit-transform 0.5s;
        transition: opacity 0.5s, transform 0.5s;
        transition: opacity 0.5s, transform 0.5s, -webkit-transform 0.5s;
    }

    .card:hover .card__thumb {
        height: 170px;
    }

    .card:hover .card__thumb img {
        opacity: 0.6;
        -webkit-transform: scale(1.2);
        transform: scale(1.2);
    }


    /**
    * card_BODY
    **/

    .card__body {
        position: relative;
        height: 150px;
        padding: 20px;
        -webkit-transition: height 0.5s;
        transition: height 0.5s;
    }

    .card:hover .card__body {
        height: 230px;
    }

    /*.card__category {*/
    /*    position: absolute;*/
    /*    top: -25px;*/
    /*    left: 0;*/
    /*    height: 25px;*/
    /*    padding: 0 15px;*/
    /*    background-color: coral;*/
    /*    color: #fff;*/
    /*    text-transform: uppercase;*/
    /*    font-size: 11px;*/
    /*    line-height: 25px;*/
    /*}*/

    .card__title {
        margin: 0;
        padding: 0 0 10px 0;
        color: #000;
        font-size: 22px;
        font-weight: bold;
        text-transform: uppercase;
    }

    /*.card__subtitle {*/
    /*    margin: 0;*/
    /*    padding: 0 0 10px 0;*/
    /*    font-size: 19px;*/
    /*    color: coral;*/
    /*}*/

    .card__description {
        /*position: absolute;*/
        /*left: 20px;*/
        /*right: 20px;*/
        /*bottom: 56px;*/
        margin: 0;
        padding: 0;
        color: #666C74;
        line-height: 27px;
        opacity: 0;
        -webkit-transform: translateY(25px);
        transform: translateY(25px);
        -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
        transition: opacity 0.3s, -webkit-transform 0.3s;
        transition: opacity 0.3s, transform 0.3s;
        transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s;
        -webkit-transition-delay: 0s;
        transition-delay: 0s;
    }

    .card:hover .card__description {
        opacity: 1;
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
        -webkit-transition-delay: 0.2s;
        transition-delay: 0.2s;
    }

    .card__footer {
        /*position: absolute;*/
        bottom: 12px;
        left: 20px;
        right: 20px;
        font-size: 11px;
        color: #A3A9A2;
    }

    .icon {
        display: inline-block;
        vertical-align: middle;
        margin: -2px 0 0 2px;
        font-size: 18px;
    }

    .icon + .icon {
        padding-left: 10px;
    }

    .customButton {
        background-color: #fff;
        border: 1px solid #444;
        border-radius: 5px;
        color: #444;
        font-size: 12px;
    }
    .detailsCustom:hover
    {
        cursor: pointer;
    }
</style>
<div class="p-3">
    <a href="{{get_tour_permalink($item->post_slug)}}" class="detailsCustom">
        <article class="card">
            <header class="card__thumb">
                <a href="#"><img src="{{asset($img)}}" alt="{{$title}}"></a>
            </header>
            <date class="card__date">
                @php echo add_wishlist_box($item->id, GMZ_SERVICE_TOUR); @endphp
            </date>
            <div class="card__body">
                <div class="card__category">
                    @if(!empty($location))
                        <p class="tour-item__location"><i class="fas fa-map-marker-alt mr-2"></i>{{$location}}</p>
                    @endif
                </div>
                <h2 class="card__title"><a href="#">{{$title}}</a></h2>
                <footer class="card__footer">
                    <span class="icon ion-clock"></span>{{get_translate($item->duration)}} duration
                    <span class="icon ion-chatbox"></span><a href="#">${{convert_price($item['adult_price'])}}</a>
                </footer>
                <div class=" card__description">
                    <p class="">
                        {!! Str::limit($content, 80, ' ...') !!}
                    </p>
                    <div class="text-center">
                        <a href="{{get_tour_permalink($item->post_slug)}}" class="btn customButton">
                            {{__('View Detail ')}}
                        </a>
                    </div>
                </div>
                {{--        </p>--}}
            </div>

        </article>
    </a>
</div>