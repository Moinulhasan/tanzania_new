@extends('Frontend::layouts.master')

@section('title', $dest->title)
@section('class_body', 'single-post')

@php
    // $post_content = get_translate($post['post_content']);
    // $post_title = get_translate($post['post_title']);
@endphp

@section('content')
    {{-- <div class="feature-image">
        <img src="{{asset('travels/'.$dest->photo)}}" alt="image" />
    </div> --}}

    @php
        // the_breadcrumb([], 'page', [
        //     'title' => __('Travel Guide')
        // ]);

        the_breadcrumb($dest, 'travel-single');

    @endphp

        {{-- <i class="fas fa-angle-right"></i> --}}


    <div class="container">
        <div class="row">
            <div class="col-lg-9 pb-5 pr-4">
                <h1 class="post-title">
                    {{$dest->title}}
                </h1>

                @if(true)
                    <section class="description">
                        <div class="section-content">
                            {!!$dest->description!!}
                        </div>
                    </section>
                @endif

                @include('Frontend::page.travel.comment')
            </div>
            <div class="col-lg-3">
                <div class="siderbar-single">
                    @include('Frontend::page.travel.sidebar')
                </div>
            </div>
        </div>
    </div>
@stop

