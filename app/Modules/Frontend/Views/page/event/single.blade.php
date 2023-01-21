@extends('Frontend::layouts.master')

@section('title', 'Upcomming Event')
@section('class_body', 'single-post')

@php
    // $post_content = get_translate($post['post_content']);
    // $post_title = get_translate($post['post_title']);
@endphp

@section('content')

    @php
        // the_breadcrumb([], 'page', [
        //     'title' => __('Upcomming Event')
        // ]);

        the_breadcrumb($dest, 'event-single');

    @endphp




    <div class="container">
        <div class="row">
            <div class="col-lg-9 pb-5 pr-4">
                <h1 class="post-title mb-2">
                    {{$dest->title}}
                </h1>

                <h5 class="my-3"> 
                    <div class="d-flex">
                        <div>
                            <i class="fal mr-1 color-pri fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($dest->start_date)->isoFormat('MMM D, YYYY')}}
                             - 
                            {{ \Carbon\Carbon::parse($dest->end_date)->isoFormat('MMM D, YYYY')}}
                        </div>
                        <div class="ml-5">
                            <i class="far mr-1 color-pri fa-map-marker-alt"></i>
                            {{$dest->location}}
                        </div>
                    </div>
                </h5>

                <hr>

                <div class="feature-image">
                    <img src="{{asset('events/'.$dest->photo)}}" alt="image" />
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
                    @include('Frontend::page.event.sidebar')
                </div>
            </div>
        </div>
    </div>
@stop

