@extends('Frontend::layouts.master')

@section('title', 'Popular Attractions')
@section('class_body', 'single-post')

@php
    // $post_content = get_translate($post['post_content']);
    // $post_title = get_translate($post['post_title']);
@endphp

@section('content')

    @php

        the_breadcrumb($dest, 'att-single');

        // the_breadcrumb([], 'page', [
        //     'title' => __('Popular Attractions')
        // ]);
    @endphp




    <div class="container">
        <div class="row">
            <div class="col-lg-9 pb-5 pr-4">
                <h1 class="post-title mb-2">
                    {{$dest->title}}
                </h1>

                <h5 class="my-3"> 
                    <div class="d-flex">
                        <div class="">
                            <i class="far mr-1 color-pri fa-map-marker-alt"></i>
                            {{$dest->location}}
                        </div>
                    </div>
                </h5>

                <hr>

                <div class="feature-image">
                    <img src="{{asset('attractions/'.$dest->photo)}}" alt="image" />
                </div>

                <section class="description mt-4">
                    <div class="section-content">
                        {!!$dest->description!!}
                    </div>
                </section>

                {{-- @include('Frontend::page.travel.comment') --}}
            </div>
            <div class="col-lg-3">
                <div class="siderbar-single">
                    @include('Frontend::page.attraction.sidebar')
                </div>
            </div>
        </div>
    </div>
@stop

