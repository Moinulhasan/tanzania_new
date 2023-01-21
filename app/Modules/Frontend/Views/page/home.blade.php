@extends('Frontend::layouts.master')

@section('title', __('Tanzania Safaris | Luxury Tanzania Safaris & Tours'))
@section('style')
    <style>
        .tour-type__info{
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            bottom: 41% !important;
        }
        .tour-type__item:hover{
            transform: scale(1.03) !important;
        }
        ._image-tour:hover{
            transform: none !important;
        }
    </style>
@endsection
@php
    enqueue_styles([
        'slick',
        'daterangepicker'
    ]);
    enqueue_scripts([
        'slick',
        'moment',
        'daterangepicker'
    ]);
@endphp
@section('content')
    @include('Frontend::page.home.slider')
    @action('gmz_homepage_after_slider')
    {{-- @include('Frontend::services.hotel.items.type') --}}

    <section class="icon-box1 bg-white py-4">
        <div class="container">
            {{-- <h2 class="title">{{__('How does it work?')}}</h2> --}}
            <div class="row d-flex">
                <div class="col-lg-4 mob_b border-right">
                    <div class="item text-left d-flex px-0">
                        {{-- <div class="number">1</div> --}}
                        <div class="my-auto mx-4 number">
                            <i class="fal fa-crown"></i>
                        </div>
                        <div>
                            <h4 class="main-text">{{__('Experienced Tour Specialists')}}</h4>
                            <p class="sub-text">{{__('Managed by tour experts in Tanzania')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mob_b border-right">
                    <div class="item text-left d-flex px-0">
                        {{-- <div class="number">1</div> --}}
                        <div class="my-auto mx-4 number">
                            <i class="fal fa-map"></i>
                        </div>
                        <div>
                            <h4 class="main-text">{{__('Tailor-made Itineraries')}}</h4>
                            <p class="sub-text">{{__('Trips designed around you')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mob_b">
                    <div class="item text-left d-flex px-0">
                        {{-- <div class="number">1</div> --}}
                        <div class="my-auto mx-4 number">
                            <i class="fal fa-dollar-sign"></i>
                        </div>
                        <div>
                            <h4 class="main-text">{{__('Fair & Transparent Pricing')}}</h4>
                            <p class="sub-text">{{__('Best price guarantee and no hidden costs')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('Frontend::services.tour.items.recent')

    @include('Frontend::services.hotel.items.recent')

    @include('Frontend::services.car.items.type')
    @include('Frontend::services.car.items.recent')
    @include('Frontend::services.apartment.items.type')
    @include('Frontend::services.apartment.items.recent')
    {{-- @include('Frontend::services.tour.items.type')
    @include('Frontend::services.tour.items.recent') --}}
    @include('Frontend::services.space.items.type')
    @include('Frontend::services.space.items.recent')
    @include('Frontend::services.beauty.items.type')
    @include('Frontend::services.beauty.items.recent')
    @include('Frontend::page.home.destination')


    <section class="icon-box1 bg-white py-5">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title my-1">{{__('WHY TRAVEL TO TANZANIA WITH TANZANIA SAFARIS?')}}</h2>
            </div>
            <div class="row d-flex">
                <div class="col-lg-6 mob_b mt-5">
                    <div class="item text-left d-flex px-0">
                        {{-- <div class="number">1</div> --}}
                        <div class="my-auto ml-4 mr-5 icn" style="max-width: 20px; min-width: 20px;">
                            <i class="far fa-sun"></i>
                        </div>
                        <div>
                            <h4 class="main-text">{{__('Government certified and registered')}}</h4>
                            <p class="sub-text">{{__('We are a legally registered tour operator and travel agency in Bhutan certified by the Tourism Council of Bhutan. When you book your tour with us, you can rest assured knowing you will be in good hands.')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mob_b mt-5">
                    <div class="item text-left d-flex px-0">
                        {{-- <div class="number">1</div> --}}
                        <div class="my-auto ml-4 mr-5 icn" style="max-width: 20px; min-width: 20px;">
                            <i class="far fa-dollar-sign"></i>
                        </div>
                        <div>
                            <h4 class="main-text">{{__('Transparent and fair pricing')}}</h4>
                            <p class="sub-text">{{__('We provide you with the lowest price for your tour with all discounts and promotional fares (if applicable) passed on to you. Our tour prices do not have any hidden charges, making it very transparent.')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mob_b mt-5">
                    <div class="item text-left d-flex px-0">
                        {{-- <div class="">1</div> --}}
                        <div class="my-auto ml-4 mr-5 icn" style="max-width: 20px; min-width: 20px;">
                            <i class="far fa-thumbs-up"></i>
                        </div>
                        <div>
                            <h4 class="main-text">{{__('High quality of service')}}</h4>
                            <p class="sub-text">{{__('All our trips are meticulously planned and managed by our local travel experts. From your tour guide to your accommodations, everything is carefully arranged to provide you the best experience on your tour of Bhutan.')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mob_b mt-5">
                    <div class="item text-left d-flex px-0">
                        {{-- <div class="">1</div> --}}
                        <div class="my-auto ml-4 mr-5 icn" style="max-width: 20px; min-width: 20px;">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <h4 class="main-text">{{__('Secure online payment. All in one trip dashboard')}}</h4>
                            <p class="sub-text">{{__('Once you are happy with your tour itinerary and cost, you can book your trip using our secure online payment platform. From your dashboard you can upload your documents, review your trip plan, download your visa and correspond with us.')}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center col-lg-12 mt-5">
                <div class="mx-auto">
                    <a class="btn btn-primary px-3" href="#">{{__('MORE ABOUT US')}}</a>
                </div>
            </div>
        </div>
    </section>

    <a target="_blank" title="restaurant tip calculator"
       style="display: inline-block; opacity: 0; cursor:default; height:0"
       href="https://dbcalculator.com/tip-calculator">restaurant tip calculator</a>

    <a target="_blank" title="significant figures calculator"
       style="display: inline-block; opacity: 0; cursor:default; height:0"
       href="https://dbcalculator.com/significant-figures-calculator">significant figures calculator</a>

    <a target="_blank" title="screen resolution calculator"
       style="display: inline-block; opacity: 0; cursor:default; height:0"
       href="https://dbcalculator.com/screen-resolution-calculator">screen resolution calculator</a>


    @include('Frontend::page.home.testimonial')
    @include('Frontend::components.sections.blog')
@stop

