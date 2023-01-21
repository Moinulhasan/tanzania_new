@extends('Frontend::layouts.master')

@section('title', __('Tanzania Safaris & Tours 2023'))
@section('class_body', 'search-page')

@php
    enqueue_styles([
        'slick',
        'daterangepicker'
    ]);
    enqueue_scripts([
        'slick',
        'moment',
        'daterangepicker',
        'jquery.nicescroll',
        'match-height',
        'gmz-search-tour'
    ]);
@endphp

@section('content')
    <section class="search-archive-top bg-light">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title mb-10">
                    <i class="fal mr- fa-calendar-alt color-pri"></i>
                    {{-- <i class="fal mr- fa-calendar-alt"></i> --}}
    
                    All Inclusive Tour Packages to Tanzania - 2022/2023
                </h2>
                <p class=" mb-4">
                    Planning a trip to Tanzania can be time consuming. That's why we have carefully designed tour packages that offer you a hassle-free way to experience Tanzania, with everything taken care of by our small team of experts, right from the booking process until the end of your trip. <br>

                    Our tour packages are carefully planned and covers most of the important sites, attractions and experiences that Tanzania has to offer. Along with guaranteed visa approvals, we offer fair and transparent prices and by booking direct with us, you are able to cut the middleman, saving yourself some money. <br>

                    Limited by the choice of tour packages? Get in touch with us and we will be able to plan out an itinerary as per your exact needs.
                </p>
            </div>
            <div class="search-form-wrapper">
                <div class="tour-search-form">
                    {{-- @php
                        $text_slider = get_translate(get_option('tour_slider_text'));
                    @endphp
                    @if(!empty($text_slider))
                        <p class="_title">{{$text_slider}}</p>
                    @endif --}}
                    @include('Frontend::services.tour.search-form', ['advanced' => false])
                </div>
            </div>
        </div>
    </section>
    <section class="list-half-map gmz-search-result" data-action="{{url('tour-search')}}">
        <div class="container-fluid">
            <div class="search-filter d-flex align-items-center">
                <div class="heading"><i class="fal fa-sliders-v-square"></i></div>
                @include('Frontend::services.tour.filter.price')
                @include('Frontend::services.tour.filter.term')
            </div>
            <div class="row">
                @include('Frontend::services.tour.search.result')
                @include('Frontend::services.tour.search.map')
            </div>
        </div>
    </section>
@stop

