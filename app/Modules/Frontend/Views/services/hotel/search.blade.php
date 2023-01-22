@extends('Frontend::layouts.master')

@section('title', __('Hotel Search Page'))
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
        'gmz-search-hotel'
    ]);
@endphp

@section('content')
    <section class="search-archive-top bg-secondary">
        <div class="container">
            <div class="search-form-wrapper">
                <div class="hotel-search-form">
                    @php
                        $text_slider = get_translate(get_option('hotel_slider_text'));
                    @endphp
                    @if(!empty($text_slider))
                        <p class="_title">{{$text_slider}}</p>
                    @endif
                    @include('Frontend::services.hotel.search-form', ['advanced' => false])
                </div>
            </div>
        </div>
    </section>
    <section class="list-half-map gmz-search-result" data-action="{{url('accommodation-search')}}">
        <div class="container-fluid">
{{--            <div class="search-filter d-flex align-items-center">--}}
{{--              --}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-2 p-3 pl-5" style="box-shadow: -3px 3px 12px -4px rgba(0,0,0,0.75)">
                    <div class="heading text-center">
                        <h3 class="font-weight-bold mb-3">Filter</h3>
                    </div>
                    @include('Frontend::services.hotel.filter.price')
                    @include('Frontend::services.hotel.filter.star')
                    @include('Frontend::services.hotel.filter.term')
                </div>
                <div class="col-md-10">
                    @include('Frontend::services.hotel.search.result')
                </div>

                {{-- @include('Frontend::services.hotel.search.map') --}}
            </div>
        </div>
    </section>
@stop

